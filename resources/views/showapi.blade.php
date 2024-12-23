<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Server API</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h3>
				@if (isset($user_name))
				Hello {{ $user_name }}.<br>
				@endif
				Welcome to the {{ $api_name }} API.
			</h3>
		</div>

		<table class="table table-bordered">
			<thead>
			<tr>
				<th>Route</th>
				<th>Description</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($api_routes as $api_route)
				<tr>
					<td><a href="{{ $api_route['url'] }}">{{ $api_route['name'] }}</a></td>
					<td>{{ $api_route['description'] }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>