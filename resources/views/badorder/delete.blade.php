@extends('app')

@section('inventory') active @endsection

@section('title') Delete Transaction @endsection

@section('content')

<div class="container">
	
	<div class="alert alert-danger">
		<p>Are you sure you want to delete this transaction?</p>
		<div class="text-right">

		{!! Form::open(['url' => '/bad/order/destroy']) !!}
			{!! Form::hidden('id', $id) !!}

		<a href="{{ action('BadOrderController@index') }}" class="btn btn-default">No</a>
		{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
		</div>
	</div>

</div>

@endsection