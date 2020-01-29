@extends('layouts.app')
@section('title', 'Register')

@section('content')

	<div class="flex justify-center">
		<div class="w-1/2">
			<div class="bg-white p-4 shadow rounded">
				<h1 class="text-4xl font-bold pb-4 border-b-2 mb-4">Register</h1>
				<form action="{{ url('register') }}" method="POST">
					@csrf
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="name">Name</label>
						<input type="text" name="name" id="name" class="px-4 py-2 border rounded outline-none w-full" placeholder="Name" required>
					</div>
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="email">Email Address</label>
						<input type="email" name="email" id="email" class="px-4 py-2 border rounded outline-none w-full" placeholder="Email Address" required>
					</div>
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="password">Password</label>
						<input type="password" name="password" id="password" class="px-4 py-2 border rounded outline-none w-full" placeholder="Password" required>
					</div>
					<div class="mb-5">
						<label class="block mb-2 font-semibold" for="password">Confirm Password</label>
						<input type="password" name="password_confirmation" id="password_confirmation" class="px-4 py-2 border rounded outline-none w-full" placeholder="Confirm Password" required>
					</div>
					<div>
						<button class="bg-orange-500 text-white rounded px-8 py-3 font-semibold" type="submit">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection