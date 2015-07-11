@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Bad Order @endsection

@section('content')

<div class="container">

	{!! Form::open(['url'=>'/bad/orders/store']) !!}
	<div class="print-area">
		<div class="text-center">
			<h4>Tradeal General Merchandise</h4>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURN OF BAD ORDER</h4>
		</div>

		<div>
			<p>
				<strong>Date: </strong>
				<span id="date">{{ $input['date'] or null }}</span>

				<span class="pull-right">
					<strong>No: </strong>
					<span id="p-no"></span>
				</span>
			</p>
			<p>
				<strong>Truck #:</strong> 
				<span id="truck-no">{{ $input['truck_no'] or null }}</span>
			</p>
		</div>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th class="text-right">Amount</th>
						<th class="hidden-print"></th>
					</tr>					
				</thead>
				<tbody id="p-table">

				</tbody>
			</table>
		</div>

		<hr>

		<p class="text-right">
			<strong>Total Amount: </strong>			
			<span id="p-total_amount">0.00</span>
		</p>

		<p>
			<strong>Received by: </strong>
			<span id="p-received_by"></span>
		</p>
		<p>
			<strong>Salesman: </strong>
			<span id="p-salesman"></span>
		</p>

	</div>

	<hr>

	<div class="page-header">
		<h2>Bad Orders</h2>
	</div>

	<!-- Form -->

	<div class="alert alert-info">
		
		<div class="form-group">
			<label>Product</label>
			<input id="product" type="text" class="form-control">
		</div>

		<hr>

		<div id="suggestion-container">
			
		</div>

		<hr>

		<div id="btn-add" class="text-right">
			<a class="btn btn-default">Add</a>
		</div>

	</div>

	<div class="form-group col-sm-6">
		<label>Truck #</label>
		<input name="truck_no" type="text" class="form-control" required
			value="{{ $input['truck_no'] or null }}">
	</div>

	<div class="form-group col-sm-6">
		<label>Date</label>
		<input name="date" type="date" class="form-control" required
			value="{{ $input['date'] or null }}">
	</div>

	<div class="form-group col-sm-6">
		<label>Received by</label>
		<input name="received_by" type="text" class="form-control" required>
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

	<div class="col-sm-12 text-right">
		{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
	</div>

	{!! Form::close() !!}
	<!-- End Form -->
	}
</div>

<script type="text/javascript">
	
	$(document).ready( function() {

		var product, boxes;

		$("input[name=truck_no]").keyup( function() {
			$("#truck-no").text($(this).val());
		});

		$("input[name=date]").change( function() {
			$("#date").text($(this).val());
		});

		$("#product").keyup( function() {
			var str = "";

			$.get('/order/query', {
				query: $(this).val()
			}, function( response ) {

				product = response.product;
				boxes = response.boxes;

				str += "<h3>" + product.name + "</h3>";				

				str += "<hr>";

				str += "<p class='col-sm-2'>Size</p>";
				str += "<p class='col-sm-3'>No of Box</p>";
				str += "<p class='col-sm-3'>No of Packs</p>";
				str += "<p class='col-sm-2'>Price</p>";
				str += "<p class='col-sm-2'>Amount</p>";

				str += "<span class='clearfix'></span>";

				$.each(boxes, function(i, box) {

					str += "<div class='box-row'>";

					str += "<div class='form-group col-sm-2'>" + 
								"<p class='form-control-static'>" + 
									box.size +
								"</p>" + 
							"</div>";

					str += "<div class='form-group col-sm-3'>" + 
								"<input type='number'" + 
								" class='form-control box'" + 
								" min='0' value='0'>" + 
							"</div>";

					str += "<div class='form-group col-sm-3'>" + 
								"<input type='number'" + 
								" class='form-control packs'" + 
								" min='0' value='0'>" + 
							"</div>";

					str += "<div class='form-group col-sm-2'>" +
								"<select name='price' class='form-control'>" +
									"<option value='" + box.purchase_price + 
									"'>Purchase Price</option>" +
									"<option value='" + box.selling_price_1 + 
									"'>Selling Price 1</option>" +
									"<option value='" + box.selling_price_2 + 
									"'>Selling Price 2</option>" +
								"</select>" +
							"</div>";

					str += "<div class='form-group col-sm-2'>" + 
								"<p class='form-control-static s-amount'" + 
								" data-amt=''" +
								">0.00</p>" +
							"</div>";

					str += "<p class='hidden packsPerBox'>" + box.no_of_packs + "</p>";

					str += "</div>";
					str += "<span class='clearfix'></span>";					
				});


				$("#suggestion-container").empty().append( str );
			});


		});

		$("#btn-add").click( function() {
			str = "";

			var sAmounts = [];

			$.each($(".s-amount"), function() {
				sAmounts.push($(this));
			});

			$.each(boxes, function(i, box) {

				$b = $(".box")[i].value;
				$p = $(".packs")[i].value;

				if($b == 0 && $p == 0){
					return true;
				}

				str += "<tr>";

				str += "<td>" + 
						product.name + 
						" @ " + box.size  +
						"<input type='hidden' name='boxes[]' value='" + 
						box.id + "'>" +
						"<input type='hidden' name='no_of_box[]' value='" + 
						$b + "'>" +
						"<input type='hidden' name='no_of_packs[]' value='" + 
						$p + "'>" +
						"<input type='hidden' name='amount' value='" + 
						sAmounts[i].data("amt") + "'>" + 
						"</td>";

				str += "<td>" + $b + " Box, " + $p + " Packs" +"</td>";

				str += "<td class='text-right p-amount'" + 
						" data-pamt='" + sAmounts[i].data("amt") + "'>" + 
						sAmounts[i].data("amt") + 
						"</td>";

				str += "<td class='text-right hidden-print'>" + 
						"<a class='btn btn-xs btn-danger btn-remove'>" + 
						"<span class='glyphicon glyphicon-remove'></span>" +
						"</a>" + 
						"</td>";

				// console.log(sAmounts[i]);

				str += "</tr>";
			});


			$("#p-table").append( str );
			setTotalAmount();
		});

		$(this).on("focusout", ".box, .packs", function() {
			if($(this).val() == ""){
				$(this).val(0);
			}
		});

		$("input[name=received_by]").keyup( function() {
			$("#p-received_by").text( $(this).val());
		});

		$("select[name=salesman]").change( function() {
			$("#p-salesman").text($("select[name=salesman] option:selected").text());
		});

		$("#p-salesman").text($("select[name=salesman] option:selected").text());

		$(this).on("change", "select[name=price]", function() {
			setAmount($(this));
		});

		$(this).on("keyup change", ".box, .packs", function(){
			setAmount($(this));
		});

		$(this).on("click", ".btn-remove", function() {
			$(this).closest("tr").remove();
			setTotalAmount();
		});

		var setAmount = function(obj) {
			obj = obj.closest(".box-row");

			var pricePerBox = obj.find("select").val();
			var packsPerBox = obj.find(".packsPerBox").text();
			var pricePerPack = pricePerBox / packsPerBox;
			var noOfBox = parseInt(obj.find(".box").val(), 10);
			var noOfPacks = parseInt(obj.find(".packs").val(), 10);
			var totalPacks = noOfBox * packsPerBox + noOfPacks;
			var amount = parseFloat(totalPacks * pricePerPack).toFixed(2);

			obj.find(".s-amount").text(amount).digits();
			obj.find(".s-amount").attr("data-amt", amount);
			return amount;
		}

		var setBadOrderNo = function() {
			$.get('/bad/order/nextid', {

			}, function(response) {
				
				$("#p-no").text(response);

				setTimeout(function() {
					setBadOrderNo();
				}, 5000)
			});
		}

		var setTotalAmount = function() {
			var totalAmount = 0;
			$.each($(".p-amount"), function() {
				totalAmount += parseFloat($(this).data("pamt"));
			});

			$("#p-total_amount").text(parseFloat(totalAmount).toFixed(2));
		}

		setBadOrderNo();

	});	
</script>

@endsection