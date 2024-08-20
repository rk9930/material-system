@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manage List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="/quantities/create"> Create New Quantity</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Material Category Name</th>
        <th>Material Name</th>
        <th>Opening balance</th>
        <th>Current balance</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($quantities as $key=>$quantity)
    @if($quantity->material_name != null)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $quantity->material_category_name }}</td>
        <td>{{ $quantity->material_name }}</td>
        <td>{{ $quantity->opening_balance }}</td>
        <td>{{ $quantity->current_balance }}</td>
        <td>
            <form action="materials/{{$quantity->material_id}}/destroy" method="POST">
                <a class="btn btn-primary" href="/materials/{{$quantity->material_id}}/edit">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>    
    @endif
    @endforeach
</table>

@endsection