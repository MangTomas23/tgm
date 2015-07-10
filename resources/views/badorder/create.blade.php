@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Bad Order @endsection

@section('content')

<div class="container">
	<div class="print-area">
		<div class="text-center">
			<h4>Tradeal General Merchandise</h4>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURN OF BAD ORDER</h4>
		</div>

		<div>
			<p>
				<strong>Date: </strong>
				<span id="date"></span>

				<span class="pull-right">
					<strong>No: </strong>
					<span id="no"></span>
				</span>
			</p>
			<p>
				<strong>Truck #:</strong> 
				<span id="truck-no"></span>
			</p>
		</div>

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

		<p>Received by: </p>
		<p>Salesman</p>

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
		<input name="truck_no" type="text" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Date</label>
		<input name="date" type="date" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Received by</label>
		<input type="text" class="form-control" required>
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

	<!-- End Form -->
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

				str += "<p class='col-sm-4'>Size</p>";
				str += "<p class='col-sm-4'>No of Box</p>";
				str += "<p class='col-sm-4'>No of Packs</p>";

				str += "<span class='clearfix'></span>";

				$.each(boxes, function(i, box) {

					str += "<div class='form-group col-sm-4'>" + 
								"<p class='form-control-static'>" + 
									box.size +
								"</p>" + 
							"</div>";

					str += "<div class='form-group col-sm-4'>" + 
								"<input type='number'" + 
								" class='form-control box'" + 
								" min='0'>" + 
							"</div>";

					str += "<div class='form-group col-sm-4'>" + 
								"<input type='number'" + 
								" class='form-control' packs" + 
								" min='0'>" + 
							"</div>";

					str += "<span class='clearfix'></span>";					
				});


				$("#suggestion-container").empty().append( str );
			});


		});

		$("#btn-add").click( function() {
			str = "";

			$.each(boxes, function(i, box) {

			});

			str += "<tr>";
			str += "<td>" + 
					product.name + 
					" @ " + 
					"</td>";
			str += "</tr>";

			$("#p-table").append( str );
		});

	});	
</script>

@endsection