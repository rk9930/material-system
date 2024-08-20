@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Quantity</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/quantities">Back</a>
            </div>
        </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Categories Name:</strong>
                {{ $quantity->categories->category_name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Name:</strong>
                {{ $quantity->materials->material_name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>In Out Quantity:</strong>
                {{ $quantity->in_out_quantity}}
            </div>
        </div>

    </div>

@endsection()