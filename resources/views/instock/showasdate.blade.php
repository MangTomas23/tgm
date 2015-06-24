@extends('app')

@section('inventory') active @endsection

@section('title') TGM - In Stock @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>{{ $instocks[0]->date }}</h1>
    </div>
</div>

@endsection