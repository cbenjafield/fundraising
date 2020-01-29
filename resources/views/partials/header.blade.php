<header class="fixed top-0 left-0 right-0 h-16 shadow-lg bg-white flex items-center px-4">
	<a href="{{ url('/') }}" class="text-3xl font-bold text-orange-500">
		{{ config('app.name') }}
	</a>
	<nav class="flex-1 ml-10 flex items-center justify-end">
		<a href="{{ url('campaigns') }}" class="hover:underline block px-3 py-2">Campaigns</a>
		<a href="{{ url('donations') }}" class="hover:underline block px-3 py-2">Donations</a>
		@guest
		<a href="{{ url('login') }}" class="hover:underline block px-3 py-2 text-orange-500">Login</a>
		<a href="{{ url('register') }}" class="hover:underline block px-3 py-2 text-orange-500">Register</a>
		@endguest
	</nav>
</header>