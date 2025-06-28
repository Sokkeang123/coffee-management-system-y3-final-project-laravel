<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coffee;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{

    public function index()
    {
        $coffees = Coffee::all();
        return view('coffees.index', compact('coffees'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('coffees.create', compact('categories', 'suppliers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'supplier_id' => 'required',
        ]);

        Coffee::create($request->only([
            'name',
            'size',
            'price',
            'stock',
            'category_id',
            'supplier_id',
        ]));

        return redirect()->route('coffees.index')->with('success', 'Coffee added successfully!');
    }

    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'supplier_id' => 'required',
        ]);

        $coffee->update($request->only([
            'name',
            'size',
            'price',
            'stock',
            'category_id',
            'supplier_id',
        ]));

        return redirect()->route('coffees.index')->with('success', 'Coffee updated!');
    }

    public function edit(Coffee $coffee)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('coffees.edit', compact('coffee', 'categories', 'suppliers'));
    }
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();
        return redirect()->route('coffees.index')->with('success', 'Coffee deleted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
