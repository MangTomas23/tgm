@extends('app')

@section('suppliers') active @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1 style="word-wrap: break-word">
            Update Supplier
            <a href="{{ action('SupplierController@delete', $supplier->id) }}" class="btn btn-danger pull-right" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
        </h1>
        <span class="clearfix"></span>
    </div>
    
    {!! Form::open(['url'=>'/supplier/update', 'class'=>'form col-sm-8 col-sm-offset-2']) !!}
        {!! Form::hidden('id', $supplier->id) !!}
        <div class="form-group col-sm-8">
            {!! Form::label('name', 'Supplier Name') !!}
            {!! Form::text('name', $supplier->name, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('contact', 'Contact') !!}
            {!! Form::text('contact', $supplier->contact, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', $supplier->address, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('SupplierController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection