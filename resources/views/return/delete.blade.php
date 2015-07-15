@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Delete @endsection

@section('content')

<div class="container">
	
	<div class="alert alert-danger">
		<p>Are you sure you want to delete this transaction?</p>
		{!! Form::open(['url' => '/return/destroy']) !!}

			{!! Form::hidden('id', $return->id) !!}

			<div class="text-right">
				<a href="{{ action('ReturnController@index') }}" 
					class="btn btn-default">
					No
				</a>
				{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
			</div>

		{!! Form::close() !!}
	</div>

</div>

@endsection