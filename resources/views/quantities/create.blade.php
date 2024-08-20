@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Quantity</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/quantities"> Back</a>
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

<form action="/quantities/store" method="POST">
    @csrf

    <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Material category:</strong>
            <select class="form-select" id="material-category-select" aria-label="Default select example" name="material_category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Material name:</strong>
            <select class="form-select" aria-label="Default select example" id="material-select" name="material_name">
                @foreach($materials as $material)
                <option value="{{$material->id}}">{{$material->material_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Date:</strong>
            <input class="date form-control" type="text" name="date">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>In-Out Quantity:</strong>
                <input type="text" name="in_out_quantity" class="form-control" placeholder="In-Out Quantity">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            showOn: "both",
        });

        $('.date').datepicker("setDate", new Date())
    });
</script>


@endsection