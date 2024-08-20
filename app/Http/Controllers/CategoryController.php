<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request )
    {
        $request->validate(
            [
            'category_name'=>'required'
            ]
        );

        Categories::create($request->all());
        return redirect('/categories')->with('success','Product created successfully.');        
    }

    public function show(Request $request)
    {
        $cat_id = $request->category_id;
        $category = Categories::where('id', $cat_id)->first();
        return view('categories.show', compact('category'));
    }

    public function edit(Request $request)
    {
        $cat_id = $request->category_id;
        $category = Categories::where('id', $cat_id)->first();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $cat_id = $request->category_id;
        $request->validate(
            [
            'category_name'=>'required'
            ]
        );
        Categories::where('id', $cat_id)->update([
            'category_name'=>$request->category_name
        ]);
        return redirect('categories')->with('success','Product updated successfully.');        
    }

    public function delete(Request $request)
    {
        Categories::where('id', $request->category_id)->delete();
        return redirect('categories')->with('success','Product deleted successfully.');        
    }

    public function getcategories()
    {
        $cat = Categories::get();
        return json_decode(json_encode($cat));
    }
}
