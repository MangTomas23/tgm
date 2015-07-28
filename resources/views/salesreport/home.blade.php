@extends('app')

@section('salesreport') active @endsection

@section('title') TGM - Sales Report @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Sales Report - {{ date('Y') }}</h1>
	</div>
	<p>Sample Data</p>
	<canvas id="myChart"></canvas>

	<div style="margin-top: 48px">
		<div class="media">
			<div class="pull-left">
				<span class="media-object" style="background-color: #CCC; width: 25px; height: 25px;"></span>
			</div>

			<div class="media-body">
				<strong>Sales</strong>
			</div>
		</div>

		<div class="media">
			<div class="pull-left">
				<span class="media-object" style="background-color: #CCC; width: 25px; height: 25px;"></span>
			</div>

			<div class="media-body">
				<strong>Actual Sales</strong>
			</div>
		</div>
	</div>

</div>
<script>

$(document).ready( function() {

	var sales = [];

	$.get('/sales/report/getMonthlySales', {

	}, function(response) {
		$.each(response, function(i, obj) {
			sales.push(obj);
		});

		console.log(sales);


		


		var ctx = $( "#myChart" ).get( 0 ).getContext( "2d" );
		
		var data = {
			labels: ["January", "February", "March", "April", "May", "June", "July",
			 			"Auguest", "September", "October", "November", "December"],
			datasets: [
					{
						label: "Actual Sales",
						fillColor: "rgba(206,0,47, 0.1)",
						strokeColor: "rgba(206,0,47,1)",
						pointColor: "#1C0006",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [1000,220,4500,6000,3000,2200,1111,1444,233,322,4333, 5666]
					},
					{
						label: "Sales",
						fillColor: "rgba(71,108,155, 0.4)",
						strokeColor: "#476C9B",
						pointColor: "#303B4C",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: sales
					}
				]
			};
		
		var options = {

				///Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines : true,

				//String - Colour of the grid lines
				scaleGridLineColor : "rgba(0,0,0,.05)",

				//Number - Width of the grid lines
				scaleGridLineWidth : 1,

				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,

				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines: true,

				//Boolean - Whether the line is curved between points
				bezierCurve : true,

				//Number - Tension of the bezier curve between points
				bezierCurveTension : 0.4,

				//Boolean - Whether to show a dot for each point
				pointDot : true,

				//Number - Radius of each point dot in pixels
				pointDotRadius : 4,

				//Number - Pixel width of point dot stroke
				pointDotStrokeWidth : 1,

				//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				pointHitDetectionRadius : 20,

				//Boolean - Whether to show a stroke for datasets
				datasetStroke : true,

				//Number - Pixel width of dataset stroke
				datasetStrokeWidth : 2,

				//Boolean - Whether to fill the dataset with a colour
				datasetFill : true,

				//String - A legend template
				legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

			};
		var myLineChart = new Chart( ctx ).Line( data, options );

		$.each($(".media-object"), function(i) {
			$(this).css("background-color", data.datasets[i].strokeColor);
		});

	});

});
	
</script>

@endsection