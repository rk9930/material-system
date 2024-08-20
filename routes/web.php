<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageMaterialsController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\QuantitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//categories routes

Route::get('/categories', [CategoryController::class, "index"]);

Route::get('/categories/create', [CategoryController::class, "create"]);
Route::post('/categories/store', [CategoryController::class, "store"]);

Route::get('/categories/{category_id}', [CategoryController::class, "show"]);

Route::get('/categories/{category_id}/edit', [CategoryController::class, "edit"]);
Route::put('/categories/{category_id}/edit', [CategoryController::class, "update"]);

Route::delete('/categories/{category_id}', [CategoryController::class, "delete"]);
Route::get('category-list',[CategoryController::class, "getcategories"] );

//materials routes
Route::get('materials', [MaterialsController::class, 'index']);

Route::get('/materials/create', [MaterialsController::class, 'create']);
Route::post('/materials/store', [MaterialsController::class, 'store']);

Route::get('/materials/{material_id}',[MaterialsController::class, 'show']);

Route::get('/materials/{material_id}/edit', [MaterialsController::class, 'edit']);
Route::put('/materials/{material_id}/edit', [MaterialsController::class, 'update']);

Route::delete('materials/{material_id}/destroy',[MaterialsController::class, 'delete'] );
Route::get('material-list',[MaterialsController::class, "getmaterials"] );


//routes for quantity

Route::get('quantities',  [QuantitiesController::class, 'index']);

Route::get('quantities/create', [QuantitiesController::class, 'create']);
Route::post('quantities/store', [QuantitiesController::class, 'store']);

Route::get('/quantities/{quantity_id}/edit', [QuantitiesController::class, 'edit']);
Route::put('/quantities/{quantity_id}/edit', [QuantitiesController::class, 'update']);

Route::delete('quantities/{quantity_id}/destroy',[QuantitiesController::class, 'delete'] );

Route::get('quantities/{quantity_id}',  [QuantitiesController::class, 'show']);


//
Route::get('/manage-materials', [ManageMaterialsController::class, 'index']);
