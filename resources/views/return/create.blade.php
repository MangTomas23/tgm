@extends('app')

@section('inventory') active @endsection

@section('title') Returned Stocks Report @endsection

@section('content')

<div class="container">

	<div class="text-right">
		<a class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</a>
	</div>

	<hr>

	{!! Form::open([ 'url' => '/return/store']) !!}
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
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURNED STOCKS REPORT</h4>	
		</div>

		<p>
			<strong>Customer: </strong>
			<span id="p-customer">
				{{ $input['customer'] or null }}
			</span>

			<span class="pull-right">
				<strong>Date: </strong>
				<span id="p-date">
					{{ $input['date'] or null }}
				</span>
			</span>
		</p>

		<p>
			<strong>Address: </strong>
			<span id="p-address">
				{{ $input['address'] or null }}
			</span>

			<span class="pull-right">
				<strong>Ref no</strong>
				<span id="p-ref_no"></span>
			</span>
		</p>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th class="hidden-print"></th>
					</tr>
				</thead>
				<tbody id="p-table">

				</tbody>
			</table>
		</div>

		<div class="text-right">
			<strong>Total Amount: </strong>
			<p id="p-totalamount"></p>
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
		<input name="customer" type="text" class="form-control" 
			value="{{ $input['customer'] or null }}" list="cust">
		<datalist id="cust">
			@foreach($customers as $customer)
				<option value="{{ $customer->name }}"></option>
			@endforeach
		</datalist>
	</div>

	<div class="form-group col-sm-6">
		<label>Date</label>
		<input name="date" type="date" class="form-control"
			value="{{ $input['date'] or null }}">
	</div>

	<div class="form-group col-sm-9">
		<label>Address</label>
		<input name="address" type="text" class="form-control"
			value="{{ $input['address'] or null }}">
	</div>

	<div class="form-group col-sm-3">
		<label>Ref. no</label>
		<input name="ref_no" type="text" class="form-control">
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

	{!! Form::close() !!}

</div>

<script type="text/javascript">
	
$(document).ready( function() {
	var customers = [];
	var product, boxes, supplier;

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
			supplier = response.supplier;

			str += "<h3>" + product.name + "</h3>";

			str += "<p>" + supplier.name + "</p>";

			str += "<hr>";

			str += "<p class='col-sm-2'><strong>Size</strong></p>";

			str += "<p class='col-sm-3'><strong>No of Box</strong></p>";

			str += "<p class='col-sm-3'><strong>No of Packs</strong></p>";

			str += "<p class='col-sm-2'><strong>Price</strong></p>";

			str += "<p class='col-sm-2'><strong>Amount</strong></p>";

			str += "<span class='clearfix'></span>";

			$.each(boxes, function(i, box) {
				str += "<div class='box-row'>"; 

				str += "<div class='form-group col-sm-2'>";
				str += "<p class='form-control-static'>" + box.size + "</p>"
				str += "</div>";

				str += "<div class='form-group col-sm-3'>";
				str += "<input type='number' class='form-control box' " + 
					   "min='0' value='0'>";
				str += "</div>";

				str += "<div class='form-group col-sm-3'>";
				str += "<input type='number' class='form-control packs' " + 
					   "min='0' value='0'>";
				str += "</div>";

				str += "<div class='form-group col-sm-2'>";
				str += "<select class='form-control s-price'>";
				str += "<option value='" + box.purchase_price + 
					   "'>Purchase Price</option>";
				str += "<option value='" + box.selling_price_1 +
				       "'>Selling Price 1</option>";
				str += "<option value='" + box.selling_price_2 +
					   "'>Selling Price 2</option>";
				str += "</select>";
				str += "</div>";

				str += "<span class='ppb' data-no='" + box.no_of_packs + "'></span>";

				str += "<div class='form-group col-sm-2'>";
				str += "<p class='form-control-static s-amount'>0.00</p>";
				str += "</div>";

				str += "<span class='clearfix'></span>";

				str += "</div>";
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
			str += "<td class='p-amount'>" + $(".s-amount")[i].innerHTML + "</td>";
			str += "<td class='hidden-print text-center'>" + 
					"<a class='btn btn-default btn-sm btn-remove'>" + 
					"<span class='glyphicon glyphicon-remove'></span>" +
					"</a></td>";
			str += "</tr>";

		});


		$("#p-table").append( str );
		$("#btn-add").addClass("disabled");

		setTotalAmount();
	});

	$("input[name=ref_no]").keyup( function() {
		$("#p-ref_no").text($(this).val());
	});

	$("#btn-print").click( function() {
		$("#print-area").print();
	});

	$("#p-salesman").text( $("select[name=salesman] option:selected").text() );

	$(this).on("keyup", ".box, .packs", function() {
		setAmount($(this));
	});

	$(this).on("change", ".s-price", function() {
		setAmount($(this));
	});

	$(this).on("click", ".btn-remove", function() {
		$(this).closest("tr").remove();
	});

	var setAmount = function(obj) {
		//s-amount
		var pricePerBox = obj.closest(".box-row").find("select").val();
		var box = obj.closest(".box-row").find(".box").val();
		var packs = obj.closest(".box-row").find(".packs").val();
		var packsPerBox = obj.closest(".box-row").find(".ppb").data('no');

		var totalPacks = (box * packsPerBox) + parseInt(packs);

		console.log(packsPerBox);

		var pricePerPack = pricePerBox / packsPerBox;

		var totalAmount = parseFloat( totalPacks * pricePerPack ).toFixed(2);

		var sAmount = obj.closest(".box-row").find(".s-amount");

		sAmount.text(totalAmount);		
		sAmount.digits();
	};

	var setTotalAmount = function() {
		var totalAmount = 0;

		$.each($(".p-amount"), function(){
			totalAmount += parseFloat($(this).text().replace(/,/g, ''),10);
		} );

		$("#p-totalamount").text(totalAmount);
	};

} );

</script>

@endsection