@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Delete @endsection

@section('content')

<div class="container">

	<div class="alert alert-danger">
		<p>Are you sure you want to delete this record?</p>
		<div class="text-right">
			{!! Form::open(['url' => '/lost/item/' . $id, 
			'method' => 'DELETE']) !!}

			<a href="/lost/item" class="btn btn-default">No</a>
			{!! Form::submit('Yes', ['class'=>'btn btn-danger']) !!}
				
			{!! Form::close() !!}
			}
		</div>
	</div>
	
</div>

@endsection