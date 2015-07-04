@extends('app')

@section('customers') active @endsection

@section('title') TGM - Edit Customer @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>Edit</h1>
	</div>

	{!! Form::open(['url' => '/customer/update']) !!}

	{!! Form::hidden('id', $customer->id) !!}

	<div class="form-group">
		<label>Name</label>
		<input name="name" type="text" class="form-control"
			value="{{ $customer->name }}" required>
	</div>

	<div class="form-group">
		<label>Address</label>
		<input name="address" type="text" class="form-control" 
			value="{{ $customer->address }}" required>
	</div>

	<div class="text-right">
		{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
	</div>

	{!! Form::close() !!}

</div>

@endsection