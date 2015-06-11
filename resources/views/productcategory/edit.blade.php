@extends('app')

@section('products') active @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Update Category</h1>
    </div>
    
    {!! Form::open(['url'=>'/product_categories/update', 'class'=>'col-sm-8 col-sm-offset-2']) !!}
        {!! Form::hidden('id', $product_category->id) !!}
        <div class="form-group">
            {!! Form::label('name', 'Category') !!}
            {!! Form::text('name', $product_category->name, ['class'=>'form-control']) !!}
        </div>
    
        <div class="text-right">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection