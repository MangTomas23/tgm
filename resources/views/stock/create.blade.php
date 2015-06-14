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
            <input name="date" type="date" class="form-control" required>
        </div>    
        <div class="form-group">
            <label>Supplier</label>
            <select name="supplier" class="form-control">
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
    
    {!! Form::open(['url'=>'/stocks/out']) !!}
        <div class="form-group">
            {!! Form::label('date', 'Date') !!}
            <input name="date" type="date" class="form-control" required>
        </div>
        <div class="form-group">
            {!! Form::label('delivered_by', 'Delivered by') !!}
            <select name="employee" class="form-control"> 
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->firstname . ' ' . $employee->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('delivered_to','Delivered to') !!}
            {!! Form::text('delivered_to', null, ['class'=>'form-control']) !!}
        </div>
        <div class="text-right">
            {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
        </div>
    {!! Form::close() !!}
    
</div>

@endsection