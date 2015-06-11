@extends('app')

@section('title') TGM - Suppliers @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Suppliers
            <a href="{{ action('SupplierController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    
    <table class="table table-default table-hover">
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @if($suppliers->isEmpty())
                <td colspan="3">No Records.</td>
            @else
                @foreach($suppliers as $supplier)
                    <tr>
                        <td><a href="{{ action('SupplierController@show', $supplier->id) }}">{{ $supplier->name }}</a></td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->address }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="page-header"></div>
    <p class="text-right">
        <strong>No. of Suppliers: </strong> <span class="badge">{{ count($suppliers) }}</span>
    </p>
</div>

@endsection