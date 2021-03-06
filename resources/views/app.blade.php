<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Fonts -->
<!--	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-xs" href="#">Tradeal General Merchandise</a>
				<a class="navbar-brand visible-xs-block" style="font-size: 1.1em" href="#">Tradeal General Merchandise</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="@yield('home')"><a href="{{ url('/') }}">Home</a></li>
                    <li class="@yield('inventory')"><a href="{{ action('InventoryController@index') }}">Inventory</a></li>
					<li class="@yield('products')"><a href="{{ action('ProductController@index') }}">Products</a></li>
                    <li class="@yield('suppliers')"><a href="{{ action('SupplierController@index') }}">Suppliers</a></li>
                    <li class="@yield('employees')"><a href="{{ action('EmployeeController@index') }}">Employees</a></li>
                    <li class="@yield('customers')"><a href="{{ action('CustomerController@index') }}">Customers</a></li>
                    <li class="@yield('pricelist')"><a href="{{ action('PriceListController@index') }}">Price List</a></li>
                    <li class="@yield('salesreport')"><a href="{{ action('SalesReportController@index') }}">Sales Report</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>


	<!-- Scripts -->
<!--	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="{{ asset('/js/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/Chart.js') }}"></script>
    <script src="{{ asset('/js/jQuery.print.js') }}"></script>
    <script>
		$.fn.digits = function () {
			'use strict';
			return this.each(function () {
				$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
			});
		};
	</script>
<!--	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
	@yield('content')
    <footer class="footer" style="padding: 10px">
    
    </footer>
	<script>
		var setAsCurrency = function() {
			$.each($('.currency'), function(){
				var v = parseFloat($(this).text()).toFixed(2);
				$(this).text(v);
				$(this).digits();
			})
		}
		
		setAsCurrency();
	</script>
</body>
</html>