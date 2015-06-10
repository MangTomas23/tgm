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
    
    <table class="table table-striped table-hover">
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
</div>

@endsection