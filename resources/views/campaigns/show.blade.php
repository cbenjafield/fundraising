@extends('layouts.app')
@section('title', $campaign->title)

@section('content')

<div class="w-full py-6 border-b flex items-center">
	<div class="flex-1 mr-10">
		<h1 class="text-3xl font-bold text-gray-800">{{ $campaign->title }}</h1>
	</div>
	<div class="flex items-center justify-end">
		<a href="{{ $campaign->url('edit') }}" class="bg-gray-200 text-gray-800 cursor-pointer font-semibold px-6 py-3 text-lg hover:bg-gray-300 rounded">Edit</a>
	</div>
</div>
<div class="w-full flex flex-wrap -mx-10 py-8">
	
	<div class="w-1/3 px-10">
		<div class="bg-white shadow rounded p-4 flex items-center mb-6">
			<span class="text-4xl mr-5 font-bold">0%</span> of goal raised
		</div>
		<div class="bg-white shadow rounded p-4 flex items-center mb-6">
			<span class="text-4xl mr-5 font-bold">£{{ $campaign->total() }}</span> total raised
		</div>
		<div class="bg-white shadow rounded p-4 flex items-center mb-6">
			<a href="{{ $campaign->url('donate') }}" class="bg-pink-600 text-white font-bold py-4 text-2xl w-full rounded shadow text-center">DONATE</a>
		</div>
	</div>

</div>

@endsection