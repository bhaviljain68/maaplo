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

    // Store a newly created customer in storage
    public function store(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|unique:customers,user_id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:customers,email',
            'address' => 'nullable|array',
            'notes' => 'nullable|array',
        ]);
        dd($validated);

        // Create the customer using the validated data
        $customer = Customer::create([
            'user_id' => $validated['user_id'],
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => json_encode($validated['address'] ?? []),
            'notes' => json_encode($validated['notes'] ?? []),
        ]);

        // After saving the customer, redirect to the customers index
        return redirect()->route('customer.index');
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
