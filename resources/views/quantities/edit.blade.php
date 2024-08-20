@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Quantity</h2>
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

<form action="/quantities/{{$quantity->id}}/edit" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Material category:</strong>
            <select class="form-select" id="material-category-select" aria-label="Default select example" name="material_category">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ ( $category->id == $quantity->material_category_id) ? 'selected' : '' }}>{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Material name:</strong>
            <select class="form-select" aria-label="Default select example" id="material-select" name="material_name">
                @foreach($materials as $material)
                <option value="{{$material->id}}" {{ ( $material->id == $quantity->material_id) ? 'selected' : '' }}>{{$material->material_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Date:</strong>
            <input class="date form-control" type="text" name="date" value="{{$quantity->date}}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>In-Out Quantity:</strong>
                <input type="text" name="in_out_quantity" class="form-control" placeholder="In-Out Quantity" value="{{$quantity->in_out_quantity}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

</form>

<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });

    // $(document).ready(function() {
    //     $.ajax({
    //         url: '/category-list',
    //         type: 'GET',
    //         success: function(data) {
    //             var select = $('#material-category-select');
    //             data.forEach(function(item) {
    //                 select.append('<option value="' + item.id + '">' + item.category_name + '</option>');
    //             });
    //         },
    //         error: function(error) {
    //             console.error('There was an error!', error);
    //         }
    //     });

    //     $.ajax({
    //         url: '/material-list',
    //         type: 'GET',
    //         success: function(data) {
    //             var select = $('#material-select');
    //             data.forEach(function(item) {
    //                 select.append('<option value="' + item.id + '">' + item.material_name + '</option>');
    //             });
    //         },
    //         error: function(error) {
    //             console.error('There was an error!', error);
    //         }
    //     });
    // });
</script>


@endsection