@extends('app')

@section('title') TGM - Employees @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Employees
            <a href="{{ action('EmployeeController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @if($employees->isEmpty())
                <tr>
                    <td colspan="4">No Records.</td>
                </tr>
            @else
                @foreach($employees as $employee)
                    <tr>
                        <td><a href="{{ action('EmployeeController@show', $employee->id) }}">{{ $employee->firstname . ' ' . $employee->lastname }}</a></td>
                        <td>{{ $employee->designation->name or 'null' }}</td>
                        <td>{{ $employee->contact }}</td>
                        <td>{{ $employee->address }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection