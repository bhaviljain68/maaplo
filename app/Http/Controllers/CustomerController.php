<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    // Display a listing of the customers
    public function index()
    {
        $customers = Customer::all();
        return Inertia::render('customer/index', [
            'customers' => $customers
        ]);
    }

    // Show the form for creating a new customer
    public function create()
    {
        return Inertia::render('customer/create');
    }


    public function store(Request $request)
    {
        $user_id = auth()->id();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f,o',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:customers',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|array',
            'half_image' => 'nullable|image|max:2048',
            'full_image' => 'nullable|image|max:2048',
        ]);

        $customer = Customer::create([
            'user_id' => $user_id,
            'name' => ucfirst($validated['name']), // Capitalize name
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => json_encode($validated['address'] ?? null),
            'notes' => json_encode($validated['notes'] ?? null),
        ]);

        // 📷 Handle Half Image
        if ($request->hasFile('half_image')) {
            $path = $request->file('half_image')->store('customers/photos', 'public');

            CustomerPhoto::create([
                'customer_id' => $customer->id,
                'image_url' => $path,
                'label' => 'half',
            ]);
        }

        // 📷 Handle Full Image
        if ($request->hasFile('full_image')) {
            $path = $request->file('full_image')->store('customers/photos', 'public');

            CustomerPhoto::create([
                'customer_id' => $customer->id,
                'image_url' => $path,
                'label' => 'full',
            ]);
        }

        return redirect()->route('customers.index');
    }



    // Display the specified customer
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return Inertia::render('customer/show', [
            'customer' => $customer
        ]);
    }

    // Show the form for editing the specified customer
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return Inertia::render('customer/edit', [
            'customer' => $customer
        ]);
    }

    // Update the specified customer in storage
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('customer.index');
    }

    // Remove the specified customer from storage
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
