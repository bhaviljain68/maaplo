<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Helpers\ImageHelper;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    // Display a listing of the customers
    public function index()
    {
        $customers = Customer::all();
        return Inertia::render('customer/Index', [
            'customers' => $customers
        ]);
    }

    // Show the form for creating a new customer
    public function create()
    {
        $user_id = auth()->id();
        return Inertia::render('customer/Create', [
            'user_id' => $user_id,
        ]);
    }

    // Store a newly created customer in storage
    public function store(Request $request)
    {
        $user_id = auth()->id();
        $user = User::findOrFail($user_id);
        if ($request->has('notes') && is_string($request->notes)) {
            $request->merge([
                'notes' => json_decode($request->notes, true),
            ]);
        }

        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f,o',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'nullable|email|unique:customers,email',
            'address' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'notes' => 'required|array',
            'half_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'full_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
            DB::beginTransaction();

            $username = preg_replace('/\s+/', '_', strtolower($user->name));
            $customerName = preg_replace('/\s+/', '_', strtolower($validated['name']));

            $address = $validated['address'];
            $addressJson = json_encode(['value' => $address]);

            // First, create the customer to get the customer ID
            $customer = Customer::create([
                // 'user_id' => $user_id,
                'name' => $validated['name'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'dob' => $validated['dob'],
                'address' => $addressJson,
                'notes' => json_encode($validated['notes']),
            ]);
            // Now that the customer is created, we have the customer ID
            $customerId = $customer->id;

            // Handle the half image if it exists
            $halfImagePath = null;
            if ($request->hasFile('half_image')) {
                $halfImagePath = ImageHelper::imageProccess(
                    $request->file('half_image'),
                    $customerId,
                    $username,
                    $user_id,
                    $customerName,
                    'faceimage'
                );
            }

            // Handle the full image if it exists
            $fullImagePath = null;
            if ($request->hasFile('full_image')) {
                $fullImagePath = ImageHelper::imageProccess(
                    $request->file('full_image'),
                    $customerId,
                    $username,
                    $user_id,
                    $customerName,
                    'fullbody'
                );
            }

            // Save images to the database after the customer is created
            if ($halfImagePath) {
                CustomerPhoto::create([
                    'customer_id' => $customer->id,
                    'image_url' => $halfImagePath,
                    'label' => 'Faceimage',
                ]);
            }

            if ($fullImagePath) {
                CustomerPhoto::create([
                    'customer_id' => $customer->id,
                    'image_url' => $fullImagePath,
                    'label' => 'Fullbody',
                ]);
            }

            DB::commit();
            ToastMagic::success('Customer created successfully!');
            return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Customer creation failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
    // Show the form for editing the specified customer
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        // Get the customer photos (face image and full-body image)
        $photos = CustomerPhoto::where('customer_id', $customer->id)->get();

        // Find the specific images
        $faceImage = $photos->where('label', 'Faceimage')->first();
        $fullBodyImage = $photos->where('label', 'Fullbody')->first();

        return Inertia::render('customer/Edit', [
            'customer' => array_merge(
                $customer->toArray(),
                ['gender' => $customer->getAttributes()['gender']],
                [
                    'face_image' => $faceImage ? $faceImage->image_url : null,
                    'full_body_image' => $fullBodyImage ? $fullBodyImage->image_url : null
                ]
            ),
            'notes' => $customer->notes ?? [],
        ]);
    }
    // Update the specified customer in storage
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email,' . $id,
            'phone' => 'required|string|max:10',
            'gender' => 'required|in:m,f,o',
            'dob' => 'nullable|date',
            'address' => 'required|string',
            'notes' => 'nullable|array',
            'half_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'full_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            // Update the base customer fields
            $customer->update([
                'name' => $validated['name'],
                'email' => $validated['email'] ?? null,
                'gender' => $validated['gender'],
                'dob' => $validated['dob'],
                'phone' => $validated['phone'],
                'notes' => json_encode($validated['notes']),
                'address' => json_encode(['value' => $validated['address']]), // keep consistent format
            ]);

            // Handle images
            $user = auth()->user();
            $username = preg_replace('/\s+/', '_', strtolower($user->name));
            $customerName = preg_replace('/\s+/', '_', strtolower($validated['name']));

            if ($request->hasFile('half_image')) {
                // Delete previous half image
                $oldHalfImage = CustomerPhoto::where('customer_id', $customer->id)
                    ->where('label', 'Faceimage')
                    ->first();


                if ($oldHalfImage) {
                    $relativePath = Str::after($oldHalfImage->image_url, 'storage/');

                    if (Storage::disk('public')->exists($relativePath)) {
                        Storage::disk('public')->delete($relativePath);
                        // dd('Image deleted', $relativePath); // You can log this or remove it in production
                    }
                }

                // Store new image
                $halfImagePath = ImageHelper::imageProccess(
                    $request->file('half_image'),
                    $customer->id,
                    $username,
                    $user->id,
                    $customerName,
                    'faceimage'
                );
                // dd($halfImagePath);

                CustomerPhoto::updateOrCreate(
                    ['customer_id' => $customer->id, 'label' => 'Faceimage'],
                    ['image_url' => $halfImagePath]
                );
            }


            if ($request->hasFile('full_image')) {
                // Delete previous full image
                $oldFullImage = CustomerPhoto::where('customer_id', $customer->id)
                    ->where('label', 'Fullbody')
                    ->first();


                if ($oldFullImage) {
                    $relativePath = Str::after($oldFullImage->image_url, 'storage/');

                    if (Storage::disk('public')->exists($relativePath)) {
                        Storage::disk('public')->delete($relativePath);
                        // dd('Image deleted', $relativePath); // You can log this or remove it in production
                    }
                }

                // Store new image
                $fullImagePath = ImageHelper::imageProccess(
                    $request->file('full_image'),
                    $customer->id,
                    $username,
                    $user->id,
                    $customerName,
                    'fullbody'
                );

                CustomerPhoto::updateOrCreate(
                    ['customer_id' => $customer->id, 'label' => 'Fullbody'],
                    ['image_url' => $fullImagePath]
                );
            }


            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Customer update failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating the customer: ' . $e->getMessage());
        }
    }

    // Remove the specified customer from storage
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found!');
        }
        $customer->delete();
        return redirect()->route('customers.index')->with('status', 'Customer deleted successfully!');
    }
}
