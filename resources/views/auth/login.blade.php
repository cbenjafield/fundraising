@extends('layouts.app')
@section('title', 'Login')

@section('content')

	<div class="flex justify-center">
		<div class="w-1/2">
			<div class="bg-white p-4 shadow rounded">
				<h1 class="text-4xl font-bold pb-4 border-b-2 mb-4">Login</h1>
				<form action="{{ url('login') }}" method="POST">
					@csrf
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="email">Email Address</label>
						<input type="email" id="email" name="email" class="px-4 py-2 border rounded outline-none w-full" placeholder="Email Address" required>
					</div>
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="password">Password</label>
						<input type="password" id="password" name="password" class="px-4 py-2 border rounded outline-none w-full" placeholder="Password" required>
					</div>
					<div class="mb-5">
						<label class="block mb-2 font-semibold text-gray-600" for="remember">
							<input type="checkbox" name="remember" id="remember" value="1" class="mr-3"> Remember?
						</label>
					</div>
					<div>
						<button class="bg-orange-500 text-white rounded px-8 py-3 font-semibold" type="submit">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection