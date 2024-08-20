@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Materials List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="/materials/create"> Create New Material</a>
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
        <th>Material Name</th>
        <th>Opening Balance</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($materials as $material)
    <tr>
        <td>{{ $material->id }}</td>
        <td>{{ $material->material_name }}</td>
        <td>{{ $material->opening_balance }}</td>
        <td>
            <form action="/materials/{{$material->id}}/destroy" method="POST">

                <a class="btn btn-info" href="/materials/{{$material->id}}">Show</a>

                <a class="btn btn-primary" href="/materials/{{$material->id}}/edit">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>

@endsection