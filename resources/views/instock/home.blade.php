@extends('app')

@section('inventory') active @endsection

@section('title') TGM - In Stocks @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>In Stocks</h1>
    </div>
    <table class="table table-default">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Total Products</th>
                <th>Total Products</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instocks as $i=>$instock)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td><a href="{{ action('InStockController@showByDate', $instock->date) }}">{{ $instock->date }}</a></td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection