@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Order @endsection

@section('content')

<div class="container">
	<div class="text-right" style="margin-bottom: 24px">
		 <a id="btn-print" class="btn btn-default hidden-print"><span class="glyphicon glyphicon-print"></span></a>
	</div>
	<div id="order-slip">
        <p>
            Order Slip
            <span class="pull-right">
                No: 
                <span id="os-number"class="badge">{{ str_pad($orderItems[0]->order->id, 4, 0, STR_PAD_LEFT) }}</span>
            </span>
        </p>
        <div class="text-center" style="margin-top:24px">
            <h3><strong>Tradeal General Merchandise</strong></h3>
            <p>Smart #: 09199980311 / Globe #: 09173179285</p>
            <p>Pacol, Naga City</p>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>Order by: </strong> <span id="os-order-by">{{ $orderItems[0]->order->customer->name }}</span></p>
                <p><strong>Address: </strong> <span id="os-address">{{ $orderItems[0]->order->customer->address }}</span></p>
            </div>
            <div class="col-xs-6 text-right">
                <p><strong>Date: </strong> <span id="os-date">{{ date_format(date_create($orderItems[0]->order->date),"m/d/Y") }}</span></p>
                <p><strong>Salesman: </strong><span id="os-salesman">{{ $orderItems[0]->order->salesman->firstname . ' ' . $orderItems[0]->order->salesman->lastname }}</span></p>
            </div>
        </div>
        <hr>
        <div class="table-responsive" style="min-height: 280px; margin-top:24px">
            <table class="table table-default">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($orderItems as $orderItem)
						<tr>
							<td>{{ $orderItem->product->name . ' @ ' . $orderItem->box->size}}</td>
							<td>{{ $orderItem->no_of_box . ' Box, ' . $orderItem->no_of_packs . ' Packs' }}</td>
							<td class="text-right">{{ $orderItem->amount }}</td>
						</tr>
					@endforeach
				</tbody>
            </table>
        </div>
        <hr>
        <div class="text-right col-xs-12">
            <p><strong>Total: </strong><span id="total-amount">P {{ $orderItems[0]->order->totalAmount($orderItems[0]->order->id) }}</span></p>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
		$('#btn-print').click(function(){
			$('#order-slip').print();
		})
	})
</script>
@endsection