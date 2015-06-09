@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Employees
            <a href="{{ action('EmployeeController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @if($employees->isEmpty())
                <tr>
                    <td colspan="3">No Records.</td>
                </tr>
            @else
                @foreach($employees as $employee)
                    <tr>{{ $employee->firstname . ' ' . $employee->lastname }}</tr>
                    <tr>{{ $employee->contact }}</tr>
                    <tr>{{ $employee->address }}</tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection