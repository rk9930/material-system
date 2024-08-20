@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Quantities List</h2>
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
        <th>In-Out Quantity</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($quantities as $quantity)
    <tr>
        <td>{{ $quantity->id }}</td>
        <td>{{ $quantity->categories->category_name }}</td>
        <td>{{ $quantity->materials->material_name }}</td>
        <td>{{ $quantity->in_out_quantity }}</td>
        <td>
            <form action="/quantities/{{$quantity->id}}/destroy" method="POST">

                <a class="btn btn-info" href="/quantities/{{$quantity->id}}">Show</a>

                <a class="btn btn-primary" href="/quantities/{{$quantity->id}}/edit">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>

@endsection