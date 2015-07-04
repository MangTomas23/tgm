@extends('app')

@section('customers') active @endsection

@section('title') TGM - Remove Customer @endsection

@section('content')

<div class="container">

	<div class="alert alert-danger">
		<p>Are you sure you want to remove {{ $customer->name }}?</p>
		<div class="text-right">
			<a href="{{ action('CustomerController@index') }}" 
				class="btn btn-default">No</a>
			<a href="{{ action('CustomerController@destroy', $customer->id) }}" 
				class="btn btn-danger">Yes</a>
		</div>
	</div>


</div>

@endsection