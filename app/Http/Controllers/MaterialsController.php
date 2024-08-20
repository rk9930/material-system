<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function index()
    {
        $materials = Materials::get();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        Materials::create($request->all());
        return redirect('materials')->with('success', 'Material Created Successfully');
    }

    public function show(Request $request)
    {
        $material_id = $request->material_id;
        $material = Materials::where('id', $material_id)->first();
        return view('materials.show', compact('material'));
    }

    public function edit(Request $request)
    {
        $material_id = $request->material_id;
        $material = Materials::where('id', $material_id)->first();
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request)
    {
        $material_id = $request->material_id;
        Materials::where('id', $material_id)->update([
            'material_name'=>$request->material_name,
            'opening_balance'=>$request->opening_balance
        ]);
        return redirect('/materials')->with('success', 'Material Updated Successfully');
    }

    public function delete(Request $request)
    {
        $material_id = $request->material_id;
        Materials::where('id', $material_id)->delete();
        return redirect('/materials')->with('success', 'Material Deleted Successfully');
    }

    public function getmaterials()
    {
        $cat = Materials::get();
        return json_decode(json_encode($cat));
    }


}
