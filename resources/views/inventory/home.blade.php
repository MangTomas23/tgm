@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Inventory @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Inventory</h1>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>In Stock</h3>
        </div>
        {!! Form::open(['url'=>'/inventory/stocks/in']) !!}
            <div class="form-group col-sm-6">
                <label>Date</label>
                <input name="date" type="date" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
                <label>Supplier</label>
                <select name="supplier" class="form-control">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 text-right">
                {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
        
        <div class="page-header">
            <h3>Add Transaction</h3>
        </div>
        
        {!! Form::open(['url'=>'/transaction/add']) !!}
            <div class="form-group col-sm-12">
                <label>Date</label>
                <input name="date" type="date" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
                <label>Delivered by: </label>
                <select name="delivered_by" class="form-control">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->firstname . ' ' . $employee->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label>Delivered To</label>
                <input name="delivered_to" type="text" class="form-control" required>
                </select>
            </div>
            <div class="form-group col-sm-12 text-right">
                {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    $(document).ready( function() {
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });
        $('input[type=date]').val(new Date().toDateInputValue());
    });
</script>
@endsection