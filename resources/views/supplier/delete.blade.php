@extends('app')

@section('suppliers') active @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Supplier</h1>
    </div>
    
    <div class="alert alert-danger col-sm-8 col-sm-offset-2">
        <p>
            Are you sure you want to remove {{ $supplier->name }}?
        </p>
        <div class="text-right">
            <a href="{{ action('SupplierController@index') }}" class="btn btn-default">No</a>
            <a href="{{ action('SupplierController@destroy', $supplier->id) }}" class="btn btn-danger">Yes</a>
        </div>
    </div>
</div>

@endsection