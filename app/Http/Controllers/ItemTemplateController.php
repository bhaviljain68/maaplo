<?php

namespace App\Http\Controllers;

use App\Models\ItemTemplate;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ItemTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemTemplate::all();
        return Inertia::render('items/Index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f,o',
            'body_part' => 'required|in:upper,lower',
            'required_measurements' => 'required|array',
        ]);
        try {
            DB::beginTransaction();
            ItemTemplate::create([
                'name' => $validated['name'],
                'gender' => $validated['gender'],
                'required_measurements' => json_encode($validated['required_measurements']),
            ]);
            DB::commit();
            ToastMagic::success('Item created successfully!');
            return redirect()->route('items.index')->with('success', 'Item created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
