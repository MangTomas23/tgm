@extends('app')

@section('inventory') active @endsection

@section('title') TGM - @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h2>
			Order no: {{ $orderNo }}
		</h2>
		<h4>
			Date: {{ $returnItems[0]->ret->date }}
		</h4>
	</div>
	
	<table class="table table-default">
		<thead>
			<th>Product</th>
			<th>Box Size</th>
			<th>No Of Box Returned</th>
			<th>No Of Packs Returned</th>
		</thead>
		<tbody>
			@foreach($returnItems as $returnItem)
				<tr>
					<td>{{ $returnItem->box->product->name }}</td>
					<td>{{ $returnItem->box->size }}</td>
					<td>{{ $returnItem->no_of_box}}</td>
					<td>{{ $returnItem->no_of_packs}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	<span class="clearfix"></span>
	<hr>
	
	<p>Total Packs Returned: {{ $returnItems->sum('no_of_packs') }}</p>
	<p>Total Box Returned: {{ $returnItems->sum('no_of_box') }}</p>
	
</div>

@endsection