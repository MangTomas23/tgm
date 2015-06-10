@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Designation</h1>
    </div>
    
    <div class="alert alert-danger col-sm-8 col-sm-offset-2">
        <p>Are you sure you want to remove {{ $designation->name }}?</p>
        <div class="text-right">
            <a href="{{ action('DesignationController@index') }}" class="btn btn-default">No</a>
            <a href="{{ action('DesignationController@destroy', $designation->id) }}" class="btn btn-danger">Yes</a>
        </div>
    </div>
</div>

@endsection