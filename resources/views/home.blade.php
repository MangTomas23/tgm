@extends('app')

@section('home') active @endsection

@section('title') TGM - Home @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h2>Mission</h2>
    </div>

    <blockquote>
        We are committed in the pursuit of producing innovative and quality 
        products with range and affordability in mind for the consumers as 
        well as building strong and trusted business foundation for the 
        benefit of the stakeholders.
    </blockquote>
    
    <div class="page-header">
        <h2>Vision</h2>
    </div>

    <blockquote>
        Our Vision is for everyone to be able to afford the good things in 
        life range, quality and price.
    </blockquote>

    <hr>

    <div class="page-header">
        <h3>Best Selling Product</h3>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="thumbnail">

            <div class="caption">
                <h1>Jelly Cup</h1>

                <p>Lai Hong Marketing</p>

                <ul class="list-unstyled">
                    <li>Purchase Price: </li>
                    <li>Selling Price 1: </li>
                    <li>Selling Price 2: </li>
                </ul>

                <p>In Stock: </p>
                <ul class="list-inline">
                    <li>Box</li>
                    <li>Packs</li>
                </ul>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection
