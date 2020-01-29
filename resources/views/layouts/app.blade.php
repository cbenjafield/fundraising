<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	@hasSection('title')
	<title>@yield('title') / {{ config('app.name') }}</title>
	@else
	<title>{{ config('app.name') }}</title>
	@endif
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
	
	<div id="app">
		@include('partials.header')
		<main class="pt-24">
			<div class="container mx-auto">
				@yield('content')
			</div>
		</main>
		@include('partials.footer')
	</div>

	@yield('scripts')

</body>
</html>