@extends('app')

@section('inventory') active @endsection

@section('title') TGM - In Stock @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>{{ $instocks[0]->date }}</h1>
    </div>
	<table class="table table-default">
		<thead>
			<tr>
				<th>Supplier</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $instocks as $instock )
				<tr>
					<td><a href="{{ action( 'InStockController@show', [ $instocks[0]->date, $instock->supplier->id ] ) }}">
							{{ $instock->supplier->name }}</a></td>
					<td class="currency">{{ $instock->date($instocks[0]->date)->where('supplier_id', $instock->supplier->id)->sum('amount') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection