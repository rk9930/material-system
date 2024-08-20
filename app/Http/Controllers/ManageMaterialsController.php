<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Materials;
use App\Models\Quantities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageMaterialsController extends Controller
{
    public function getMaterial($material_id)
    {
        $mat = Materials::where('id', $material_id)->first();
        return $mat;
    }

    public function getMaterialCategory($cat_id) {
        $cat = Categories::where('id', $cat_id)->first();
        return $cat;
    }

    public function getCurrentBalance($opening_balance, $total_in_out)
    {
        return $opening_balance + $total_in_out;
    }


    public function index()
    {
        $quantities = DB::table('quantities')
            ->select(DB::raw('SUM(in_out_quantity) as total_in_out'), 'material_category_id', 'material_id')
            ->groupBy('material_category_id', 'material_id')
            ->get();
        // $quantities = json_decode(json_encode($quantities));
        $quantities->map(function($elem){
            // dd($elem->material_category_id);
            $materialCat = $this->getMaterialCategory($elem->material_category_id);
            $elem->material_category_name = $materialCat->category_name;
            $material = $this->getMaterial($elem->material_id);
            $elem->material_name = $material->material_name ?? null;
            $elem->opening_balance = $material->opening_balance ?? null;
            if($material != null){
                $elem->current_balance = $material->opening_balance ? $this->getCurrentBalance($material->opening_balance, $elem->total_in_out) : null;
            }
        });
        $quantities = json_decode(json_encode($quantities));


        $quantities = array_filter($quantities, function($item){
            return !is_null($item->material_name);
        });
        // dd($quantities);
        return view('manageMaterial.index', compact('quantities'));
        // DB::enableQueryLog();
        // $quantities = Quantities::with('categories')->with('materials')->get();
        // return view('quantities.index', compact('quantities'));
    }
}
