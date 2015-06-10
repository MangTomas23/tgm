@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Designations</h1>
    </div>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Designation</th>
            </tr>
        </thead>
        <tbody>
            @if($designations->isEmpty())
                <tr>
                    <td>No Records.</td>
                </tr>
            @else
                @foreach($designations as $designation)
                    <tr>
                        <td>{{ $designation->name }}</td>
                        <td>
                            <a href="{{ action('DesignationController@delete', $designation->id) }}" class="btn btn-danger btn-sm pull-right">Delete</a>
                            <a class="btn btn-info btn-sm pull-right">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    
    <div class="page-header">
        <h3>Add Designation</h3>
    </div>
    {!! Form::open(['url'=>'/emp/designation/create', 'class'=>'col-sm-5']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Designation') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group text-right">
            <a href="#" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection
