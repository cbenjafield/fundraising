@extends('layouts.app')
@section('title', 'Campaigns')

@section('content')

<div class="w-full py-6 border-b flex items-center">
	<div class="flex-1 mr-10">
		<h1 class="text-3xl font-bold text-gray-800">My Campaigns</h1>
	</div>
	<div class="flex items-center justify-end">
		<a href="{{ url('campaigns/create') }}" class="bg-gray-200 text-gray-800 cursor-pointer font-semibold px-6 py-3 text-lg hover:bg-gray-300 rounded">Create</a>
	</div>
</div>
<div class="w-full">
	
	

</div>

@endsection