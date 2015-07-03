@extends('app')

@section('inventory') active @endsection

@section('title') Returned Stocks Report @endsection

@section('content')

<div class="container">

	<div id="print-area">	
		<p>
			<strong>Returned Stocks</strong>

			<span class="pull-right">
				<strong>No: </strong>
				<span id="p-no">0001</span>
			</span>
		</p>

		<div class="text-center">
			<h2>Tradeal General Merchandise</h2>
			<p>Contact</p>
			<h4>RETURNED STOCKS REPORT</h4>	
		</div>

		<p>
			<strong>Customer: </strong>
			<span id="p-customer"></span>

			<span class="pull-right">
				<strong>Date: </strong>
				<span id="p-date"></span>
			</span>
		</p>

		<p>
			<strong>Address: </strong>
			<span id="p-address"></span>
		</p>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody id="p-table">

				</tbody>
			</table>
		</div>

		<hr>

		<p class="text-center">
			I hereby certify the above statement or 
			figure are true and correct.
		</p>

		<p>
			<strong>Salesman: </strong>
			<span id="p-salesman"></span>

			<span class="pull-right">
				<strong>Area: </strong>
				<span id="p-area"></span>
			</span>
		</p>

		<p>
			<strong>Received by: </strong>
			<span id="p-received_by"></span>

			<span class="pull-right">
				<strong>Checked by: </strong>
				<span id="p-checked_by"></span>
			</span>
		</p>

	</div>

	<hr>

	<div class="alert alert-info">
		<div class="form-group">
			<label>Product</label>
			<input id="in-product" type="text" class="form-control">
		</div>

		<hr>

		<div id="suggestion-container">

		</div>

		<hr>

		<div class="text-right">
			<a id="btn-add" class="btn btn-default">Add</a>
		</div>

		<span class="clearfix"></span>

	</div>

	<div class="form-group col-sm-6">
		<label>Customer</label>
		<input name="customer" type="text" class="form-control" list="cust">
		<datalist id="cust">
			@foreach($customers as $customer)
				<option value="{{ $customer->name }}"></option>
			@endforeach
		</datalist>
	</div>

	<div class="form-group col-sm-6">
		<label>Date</label>
		<input name="date" type="date" class="form-control">
	</div>

	<div class="form-group col-sm-12">
		<label>Address</label>
		<input name="address" type="text" class="form-control">
	</div>

	<div class="form-group col-sm-6">
		<label>Salesman</label>
		<select name="salesman" class="form-control">
			@foreach($salesmen as $salesman)
				<option value="{{ $salesman->id }}">
					{{ $salesman->firstname . ' ' . $salesman->lastname }}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-sm-6">
		<label>Area</label>
		<input name="area" type="text" class="form-control"> 
	</div>

	<div class="form-group col-sm-6">
		<label>Received by</label>
		<input name="received_by" type="text" class="form-control">
	</div>

	<div class="form-group col-sm-6">
		<label>Checked by</label>
		<input name="checked_by" type="text" class="form-control">
	</div>

	<div class="col-sm-12 text-right">
		{!! Form::submit('Save & Print', ['class' => 'btn btn-success']) !!}
	</div>

</div>

<script type="text/javascript">
	
$(document).ready( function() {
	var customers = [];
	var product, boxes;

	@foreach($customers as $customer)
		customers.push({
			id: {{ $customer->id }},
			name: "{{ $customer->name }}",
			address: "{{ $customer->address }}"
		});
	@endforeach

	$(this).on("focusout keyup", $("input[name=customer]"), function () {
		var val = $("input[name=customer]").val();
		$.each(customers, function(i, customer){
			if( val.toLowerCase() == customer.name.toLowerCase() ){
				$("input[name=address]").val( customer.address );
				$("#p-address").text( customer.address );
				return false;
			}
		});

		$("#p-customer").text( val );
	});

	$("input[name=date]").change( function() {
		$("#p-date").text($(this).val());
	});

	$("input[name=address]").change( function() {
		$("#p-address").text($(this).val());
	});

	$("input[name=area]").keyup( function() {
		$("#p-area").text($(this).val());
	});

	$("input[name=checked_by]").keyup( function() {
		$("#p-checked_by").text($(this).val());
	});

	$("input[name=received_by]").keyup( function() {
		$("#p-received_by").text($(this).val());
	});

	$("select[name=salesman]").change( function() {
		$("#p-salesman").text($("select[name=salesman] option:selected").text());
	});

	$("#in-product").keyup( function() {
		$.get("/order/query", {
			query: $(this).val()
		}, function(response) {
			var str = "";
			product = response.product;
			boxes = response.boxes;

			str += "<h3>" + product.name + "</h3>";

			str += "<hr>";

			str += "<p class='col-sm-4'><strong>Size</strong></p>";

			str += "<p class='col-sm-4'><strong>No of Box</strong></p>";

			str += "<p class='col-sm-4'><strong>No of Packs</strong></p>";

			$.each(boxes, function(i, boxes) {
				str += "<div class='form-group col-sm-4'>";
				str += "<p class='form-control-static'>" + boxes.size + "</p>"
				str += "</div>";

				str += "<div class='form-group col-sm-4'>";
				str += "<input type='number' class='form-control box' " + 
					   "min='0' value='0'>";
				str += "</div>";

				str += "<div class='form-group col-sm-4'>";
				str += "<input type='number' class='form-control packs' " + 
					   "min='0' value='0'>";
				str += "</div>";

				str += "<span class='clearfix'></span>";
			});

			$("#suggestion-container").empty().append( str );
			$("#btn-add").removeClass("disabled");
		});
	});

	$("#btn-add").click( function() {
		var str = "";

		$.each(boxes, function(i, box) {
			var b = $(".box")[i].value;
			var p = $(".packs")[i].value;

			if( b == 0 && p == 0 ) {
				return true;
			}

			str += "<tr>";
			str += "<td>" + product.name + " @ " + box.size + "</td>";
			str += "<td>" + b + " Box, " + p + " Packs" + "</td>";
			str += "</tr>";
		});


		$("#p-table").append( str );
		$("#btn-add").addClass("disabled");
	});

	$("#btn-print").click( function() {
		$("#print-area").print();
	});

	$("#p-salesman").text( $("select[name=salesman] option:selected").text() );

} );

</script>

@endsection