@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Successful @endsection

@section('content')

<div class="container">
	<div class="alert alert-success">
		Order Successful. <a href="{{ action('OrderController@create') }}" class="alert-link">Add order</a> 
	</div>
</div>

@endsection()