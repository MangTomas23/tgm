@extends('app')

@section('employees') active @endsection

@section('title') TGM - Update Designation @endsection

@section('content')

<div class="container">
    <div class="page-header"> 
        <h1>Update Designation</h1>
    </div>
    
    {!! Form::open(['url'=>'/emp/designation/update', 'class'=>'col-sm-8 col-sm-offset-2']) !!}
        {!! Form::hidden('id', $designation->id) !!}
        <div class="form-group">
            {!! Form::label('name', 'Designation') !!}
            {!! Form::text('name', $designation->name, ['class'=>'form-control']) !!}
        </div>
    
        <div class="text-right">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
        
    {!! Form::close() !!}
</div>

@endsection