@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Product Categories</h1>
    </div>
    <table class="table table-default">
        <thead>
            <tr>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @if($product_categories->isEmpty())
                <td>No records.</td>
            @else
                @foreach($product_categories as $product_category)
                    <tr>
                        <td>{{ $product_category->name }}</td>
                        <td class="text-right">
                            <a href="{{ action('ProductCategoryController@edit', $product_category->id) }}" class="btn btn-info btn-sm" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ action('ProductCategoryController@delete', $product_category->id) }}" class="btn btn-danger btn-sm" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="page-header">
        <h3>Add Category</h3>
    </div>
    {!! Form::open(['url'=>'/product_categories/create', 'class'=>'col-sm-6']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Category'); !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group text-right">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection