@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Category</h1>
    </div>
    <div class="alert alert-danger">
        <p>Are you sure you want to remove {{ $product_category->name }}?</p>
        
    </div>
    
</div>

@endsection