<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Materials;
use App\Models\Quantities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuantitiesController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();
        $quantities = Quantities::with('categories')->with('materials')->get();
        return view('quantities.index', compact('quantities'));
    }


    public function create()
    {
        $categories = Categories::get();
        $materials = Materials::get();
        return view('quantities.create', compact('categories', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "material_category"=>'required',
            "material_name"=>'required',
            "date"=>'required',
            "in_out_quantity"=>'required|numeric|regex:/^-?\d+(\.\d+)?$/',
        ]);
        Quantities::create([
            'material_category_id'=>$request->material_category,
            'material_id'=>$request->material_name,
            'date'=>$request->date,
            'in_out_quantity'=>$request->in_out_quantity
        ]);
        return redirect('/quantities')->with('success', 'Quantities Added Successfully.');
    }

    public function edit(Request $request)
    {
        $quant_id = $request->quantity_id;
        $quantity = Quantities::where('id', $quant_id)->first();
        $categories = Categories::get();
        $materials = Materials::get();
        return view('quantities.edit', compact('quantity', 'categories', 'materials'));
    }

    public function update(Request $request)
    {
        $quant_id = $request->quantity_id;
        $request->validate([
            "material_category"=>'required',
            "material_name"=>'required',
            "date"=>'required',
            "in_out_quantity"=>'required|numeric|regex:/^-?\d+(\.\d+)?$/',
        ]);
        Quantities::where('id', $quant_id)->update([
            'material_category_id'=>$request->material_category,
            'material_id'=>$request->material_name,
            'date'=>$request->date,
            'in_out_quantity'=>$request->in_out_quantity            
        ]);
        return redirect('quantities')->with('success', 'Quantity updated successfully.');
    }

    public function show(Request $request)
    {
        $quant_id = $request->quantity_id;

        $quantity = Quantities::with('categories')->with('materials')->where('id', $quant_id)->first();

        return view('quantities.show', compact('quantity'));
    }
}
