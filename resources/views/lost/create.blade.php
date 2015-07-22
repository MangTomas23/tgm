@extends('app')

@section('inventory') active @endsection

@section('title') Create @endsection

@section('content')

<div class="container">

	<div class="text-right">
		<a class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</a>
	</div>

	<hr>

	<div class="print-area">

		<div class="text-center">
			<h2>Tradeal General Merchandise</h2>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h3>Report Lost Item</h3>
		</div>

		<p>
			<strong>Date: </strong>
			<span id="p-date"></span>

			<span class="pull-right">
				<strong>No: </strong>
				<span id="p-no"></span>
			</span>
		</p>
		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="p-table">
					
				</tbody>
			</table>
		</div>

		<hr>

		<div class="alert alert-info">
			<div class="form-group">
				<label>Product</label>
				<input name="product" type="text" class="form-control">
			</div>
			<p id="loading" class="hidden">Loading</p>

			<hr>

			<h3 id="s-pname"></h3>
			<p id="s-sname"></p>

			<hr>

			<div id="suggestion-box">
				
			</div>

			<hr>

			<div class="text-right">
				<a id="btn-add" class="btn btn-default">Add</a>
			</div>
		</div>
		
	</div>

</div>

<script type="text/javascript">

	$(document).ready( function() {

		var product, boxes;

		$("input[name=product]").keyup( function() {

			$.get('/order/query', {
				query: $(this).val()
			}, function(response) {
				var str = "";

				product = response.product;
				boxes = response.boxes;


				$("#s-pname").text(product.name);
				$("#s-sname").text(response.supplier.name);

				str += "<p class='col-sm-2'><strong>Size</strong></p>";
				str += "<p class='col-sm-2'><strong>No of Box</strong></p>";
				str += "<p class='col-sm-2'><strong>No of Packs</strong></p>";
				str += "<p class='col-sm-2'><strong>Price</strong></p>";
				str += "<p class='col-sm-2'><strong>Amount</strong></p>";

				str += "<span class='clearfix'></span>"

				$.each( boxes, function(i, box) {

					str += "<div class='box-row'>";

					str += "<p class='col-sm-2'>" + box.size + "</p>";

					str += "<div class='form-group col-sm-2'>" +
							"<input type='number' class='form-control box'" +
							" data-packs_per_box='" + box.no_of_packs + "' " + 
							"value='0' min='0'>" +
							"</div>";

					str +=	"<div class='form-group col-sm-2'>" +
								"<input type='number' class='form-control packs'>" +
							 "</div>";

					str += "<div class='form-group col-sm-2'>" + 
							"<select class='form-control price'>" +
								"<option value='" + box.purchase_price + "'>Purchase Price</option>" + 
								"<option value='" + box.selling_price_1 + "'>Selling Price 1</option>" + 
								"<option value='" + box.selling_price_2 + "'>Selling Price 2</option>" + 
							"</select>" + 
							"</div>";

					str += "<p  class='col-sm-2 s-amount'>0.00</p>";

					str += "</div>";

					str += "<span class='clearfix'></span>";


				});

				$("#suggestion-box").empty().append( str );
			});
		});


		$("#btn-add").click( function() {
			var str = "";

			$.each(boxes, function(i, box) {

				var b = $(".box")[i].value;
				var p = $(".packs")[i].value;

				if(b == 0 && p == 0){
					return true;
				}

				str += "<tr>";
				str += "<td>" + product.name + " @ " + box.size + "</td>";
				str += "<td>" + b + " Box, " + p + " Packs</td>";
				str += "<td>" + $(".s-amount")[i].innerHTML + "</td>";
				str += "<td class='text-center'>" +
							"<a class='btn btn-default btn-remove'>" + 
								"<span class='glyphicon glyphicon-remove'></span>"
							"</a>" + 
						"</td>";
				str += "</tr>";
			});


			$("#p-table").append( str );
		});

		$(this).on("keyup change", ".box, .packs, .price", function() {
			setAmount($(this));
		});

		$(this).on("focusout", ".box, .packs", function() {
			if($(this).val() == ""){
				$(this).val(0);		
			}			
		});

		$(this).on("click", ".btn-remove", function() {
			$(this).closest("tr").remove();
		});


		var setAmount   = function(obj) {

			var noOfBox     = obj.closest(".box-row").find(".box").val();
			var noOfPacks   = obj.closest(".box-row").find(".packs").val();
			var packsPerBox = obj.closest(".box-row").find(".box")
								.data("packs_per_box");
			var pricePerBox = obj.closest(".box-row").find("select").val();
			var sAmount     = obj.closest(".box-row").find(".s-amount");
			var pricePerPack = pricePerBox/packsPerBox;
			
			var amount = parseFloat((noOfBox * pricePerBox) + 
						(noOfPacks * pricePerPack)).toFixed(2);


			sAmount.text(amount).digits();
			sAmount.attr("data-amount", amount);
		}
	});

</script>

@endsection