@extends('app')

@section('inventory') active @endsection

@section('content')

<div class="container">
	<div class="text-right">
		<a id="btn-print" class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</a>
	</div>

	{!! Form::open([ 'url' => '/order/save', 'id' => 'p-form' ]) !!}

	<div id="print-area">
		<div class="text-center">
			<h2>Tradeal General Merchandise</h2>
			<p>Smart #: 09199980311 / Globe #: 09173179285</p>
			<h4>RETURN OF BAD ORDERS</h4>
		</div>
		<p>
			<strong>Date: </strong>
			<span id="pdate"></span>
			<span class="pull-right">
				<strong>No: </strong>
				<span style="color: #F00">0001</span>
			</span>
		</p>
		<p>
			<strong>Truck no: </strong>
			<span id="ptruck-no"></span>
		</p>

		<div class="table-responsive"
			 style="min-height: 360px">
			<table 	class="table table-bordered">
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

		<p>
			<strong>Received By: </strong>
			<span id="p-received_by"></span>
		</p>
		<p>
			<strong>Salesman: </strong>
			<span id="p-salesman"></span>
		</p>
	</div>

	<hr>

	<div class="alert alert-info">
		<div class="form-group">
			<label>Product</label>
			<input type="text" id="in-product" class="form-control">
		</div>

		<hr>

		<div id="suggestion-container">

		</div>

		<div class="col-sm-12 text-right">
			<a id="btn-add" class="btn btn-default">Add</a>
		</div>
		<span class="clearfix"></span>
	</div>

	<div class="form-group col-sm-6">
		<label>Truck No.</label>
		<input name="truck_no" type="text" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Date: </label>
		<input name="date" type="date" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label for="salesman">Salesman</label>
		<select name="salesman" class="form-control">
			@foreach($salesmen as $salesman)
				<option value="{{ $salesman->id }}">
					{{ $salesman->firstname . ' ' . $salesman->lastname }}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-sm-6">
		<label>Received by: </label>
		<input name="received_by" type="text" class="form-control" required>
	</div>


	<div class="col-sm-12 text-right">
		{!! Form::submit("Save", ["class" => "btn btn-success", "id" => "btn-save"]) !!}
	</div>

	{!! Form::close() !!}
</div>

<script type="text/javascript">

$(document).ready(function() {

	var response, product, boxes;

	$("#btn-print").click( function() {
		$("#print-area").print();
	});

	$(this).on("focusout change", "select[name=salesman]", function() {
		$("#p-salesman").text(
			$("select[name=salesman] option:selected").text());
	});

	$("#in-product").keyup( function() {
		$.get("/order/query", {
			query: $(this).val()
		}, function(response) {
			product = response.product;
			boxes = response.boxes;

			var str = "";

			str += "<h4>" + product.name + "</h4>";

			str += 	"<p class='col-sm-4'><strong>Size</strong></p>";

			str +=	"<p class='col-sm-4'><strong>No of Box</strong></p>";

			str +=	"<p class='col-sm-4'><strong>No of Packs</strong></p>";

			str += 	"<span class='clearfix'></span>";

			$.each(boxes, function(i) {
				str += 	"<div class='form-group col-sm-4'>" + 
							"<p class='form-control-static'>" +  
								boxes[i].size +
							"</p>" +
						"</div>";

				str += 	"<div class='form-group col-sm-4'>" +
							"<input name='number_of_box[]' type='number' " + 
							" class='form-control box' " + 
									"min='0' value='0'>" +
						"</div>";

				str += 	"<div class='form-group col-sm-4'>" +
							"<input name='number_of_packs' type='number' " + 
							" class='form-control packs' " + 
									"min='0' value='0'>" +
						"</div>";
				
				str += 	"<span class='clearfix'></span>";
			});


			$("#suggestion-container").empty().append( str );
		});

	});

	$("#btn-add").click( function() {

		var str = "";

		$.each(boxes, function(i) {

			var box = $(".box")[i].value;
			var packs = $(".packs")[i].value;

			if( box == 0 && packs == 0 ) {
				return true;
			}
			str += "<tr>";
			str += "<td>" + product.name + " @ " + boxes[i].size + "</td>";
			str += "<td>" + box + " box, " + packs + " packs" + "</td>";
			str += "</tr>";
		});

		$("#p-table").append( str );
	});

	$("input[name=truck_no]").keyup( function() {
		$("#ptruck-no").text($(this).val());
	});

	$("input[name=date]").change( function() {
		$("#pdate").text($(this).val());
	})

	$("#p-salesman").text($("select[name=salesman] option:selected").text());

	$("input[name=received_by]").keyup( function() {
		$("#p-received_by").text($(this).val());
	});

	$( "#p-form" ).submit( function( event ) {
		if( $( "#p-table tr" ).length == 0 ) {
			alert( "empty" );
			event.preventDefault();
		}
	} );
})

</script>

@endsection