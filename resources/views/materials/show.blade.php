@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Material</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/materials">Back</a>
            </div>
        </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $material->material_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Opening Balance:</strong>
                {{ $material->opening_balance }}
            </div>
        </div>
    </div>

@endsection()