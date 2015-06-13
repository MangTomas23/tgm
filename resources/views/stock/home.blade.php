@extends('app')

@section('stocks') active @endsection

@section('title') TGM- Stocks @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Stocks</h1>
    </div>
    <div class="page-header">
        <h3>In</h3>
    </div>
    
    {!! Form::open(['url'=>'/stocks/in']) !!}
        <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control">
        </div>    
        <div class="form-group">
            <label>Supplier</label>
            <select class="form-control">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group text-right">
            {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
        </div>
    
    {!! Form::close() !!}
    
    <div class="page-header">
        <h3>Out</h3>
    </div>
</div>

@endsection