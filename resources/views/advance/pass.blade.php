@extends('app')

@section('title') Advance Options @endsection

@section('content')

<div class="container">
	<div class="alert alert-danger">
		{!! Form::open(['url'=>'/developer/advance/options/pass']) !!}
			<div class="form-group">
				{!! Form::label('passcode', 'Please enter passcode.') !!}
				<input type="password" name="passcode" class="form-control" placeholder="Warning! Intended for developer use only!">
			</div>
			{!! Form::submit('Enter', ['class'=>'btn btn-danger']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection