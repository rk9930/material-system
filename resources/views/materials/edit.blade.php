@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/materials"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="/materials/{{$material->id}}/edit" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Materials Name:</strong>
                    <input type="text" name="material_name" value="{{ $material->material_name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Opening Balance:</strong>
                    <input type="text" name="opening_balance" value="{{ $material->opening_balance }}" class="form-control" placeholder="Name">
                </div>
            </div>


        </div>

        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>            
        </div>
   
    </form>
@endsection