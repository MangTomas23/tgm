@extends('app')

@section('suppliers') active @endsection

@section('title') TGM - Suppliers @endsection

@section('content')

<div class="container">
    <div class="hidden-print">
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
        <hr>
        <p class="text-right">
            <strong>No. of Suppliers: </strong> <span class="badge">{{ count($suppliers) }}</span>
        </p>
    </div>
    
    <div class="col-xs-12 visible-print">
        <h3><strong>Tradeal General Merchandise</strong><small id="date" class="pull-right"></small></h3>
        <h4>Suppliers</h4>
    </div>
    
    
    
    <p class="visible-md-12 hidden-print">Press <kbd>ctrl + p</kbd> to print</p>

    <canvas id="myChart"></canvas>
    <canvas id="supplierChart"></canvas>
    <div class="text-center" style="margin-top: 24px">
        <ul id="legend" class="list-inline"></ul>
    </div>
    
    <style id="legendStyle"></style>
    
    <script>
        $(document).ready(function(){
            var ctx = [$("#myChart").get(0).getContext("2d"),$("#supplierChart").get(0).getContext("2d")];
            
            /*var suppliers = [];
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
            
            var myBarChart = new Chart(ctx[0]).Bar(data, options);*/
            var colors = [
                ['#b71066','#34e4ea','#3185fc','#5aff15','#ffc857','#98C9A3'],
                ['#dd177d','#68eff4','#6fabff','#9fff76','#ffd580','#a4d8af']
            ];
            
            
            var suppliers = [];
            
            @foreach($suppliers as $supplier)
                suppliers.push({name: '{{ $supplier->name }}', productCount: {{ count($supplier->products) }} }  )
            @endforeach
            
            $.each(suppliers, function(i,supplier){
                $('#legend').append('<li><div class="media-middle legend'+i+'" style="width:12px;height:12px;background-color:'+ colors[0][i] +';display:inline-block;"></div> '+ supplier.name +' <span class="badge">'+ supplier.productCount +'</span></li>')
                $('#legendStyle').append(
                    '@media print{' +
                        '.legend' + i + '{' +
                            'background-color: ' + colors[0][i] + ' !important;' +
                        '}' +
                    '}'
                )
            })
            
                
            var data = [
                            @foreach($suppliers as $i=>$supplier)
                                {
                                    value: {{ count($supplier->products) }},
                                    color: colors[0][{{ $i }}],
                                    highlight: colors[1][{{ $i }}],
                                    label: "{{ $supplier->name }}"
                                }@if($i+1 != count($suppliers)), @endif
                           @endforeach
                        ]
                        

            var options = {
                            //Boolean - Whether we should show a stroke on each segment
                            segmentShowStroke : true,

                            //String - The colour of each segment stroke
                            segmentStrokeColor : "#fff",

                            //Number - The width of each segment stroke
                            segmentStrokeWidth : 2,

                            //Number - The percentage of the chart that we cut out of the middle
                            percentageInnerCutout : 50, // This is 0 for Pie charts

                            //Number - Amount of animation steps
                            animationSteps : 100,

                            //String - Animation easing effect
                            animationEasing : "easeOutBounce",

                            //Boolean - Whether we animate the rotation of the Doughnut
                            animateRotate : true,

                            //Boolean - Whether we animate scaling the Doughnut from the centre
                            animateScale : false,

                            //String - A legend template
                            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

                        }
            var myPieChart = new Chart(ctx[1]).Pie(data,options);
        });
        
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = d.getFullYear() + '/' +
            (month<10 ? '0' : '') + month + '/' +
            (day<10 ? '0' : '') + day;
        
        $('#date').text('Date: ' + output)
        
    </script>
</div>

@endsection