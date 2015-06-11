@extends('app')

@section('suppliers') active @endsection

@section('title') TGM - Suppliers @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Suppliers
            <a href="{{ action('SupplierController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    
    <table class="table table-default table-hover">
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @if($suppliers->isEmpty())
                <td colspan="3">No Records.</td>
            @else
                @foreach($suppliers as $supplier)
                    <tr>
                        <td><a href="{{ action('SupplierController@show', $supplier->id) }}">{{ $supplier->name }}</a></td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->address }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="page-header"></div>
    <p class="text-right">
        <strong>No. of Suppliers: </strong> <span class="badge">{{ count($suppliers) }}</span>
    </p>
    
    <canvas id="myChart"></canvas>
    
    <script>
        $(document).ready(function(){
            var ctx = $("#myChart").get(0).getContext("2d");
            
            var suppliers = [];
            suppliers['names'] = [];
            suppliers['product_counts'] = [];
            
            @foreach($suppliers as $supplier)
                suppliers.names.push('{{ $supplier->name }}');
                suppliers.product_counts.push({{ count($supplier->products) }});
            @endforeach
            
            
            console.log(suppliers.names);
            
            var data = {
                labels: suppliers.names,
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(75, 94, 172, 0.5)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: suppliers.product_counts
                    }
                ]
            };
            
            var options = {
                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero : true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines : true,

                    //String - Colour of the grid lines
                    scaleGridLineColor : "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth : 1,

                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,

                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke : true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth : 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing : 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing : 1,

                    //String - A legend template
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
            }
            
            var myBarChart = new Chart(ctx).Bar(data, options);
        });
        
    </script>
</div>

@endsection