@extends('layouts.app')
@section('title', 'Create Campaign')

@section('content')

<div class="w-full py-6 border-b flex items-center">
	<div class="flex-1 mr-10">
		<h1 class="text-3xl font-bold text-gray-800">Create Campaign</h1>
	</div>
	<div class="flex items-center justify-end">
		<a href="{{ url('campaigns') }}" class="bg-gray-200 text-gray-800 cursor-pointer font-semibold px-6 py-3 text-lg hover:bg-gray-300 rounded">All Campaigns</a>
	</div>
</div>
<div class="w-full flex justify-center">
	
	<div class="max-w-full w-8/12 py-10">
		
		{{-- Would probably turn this into a Vue component for better UX --}}
		<form action="{{ url('campaigns') }}" method="POST" id="createCampaignForm">
			@csrf
			@include('partials.validation')

			<div class="flex items-center mb-5">
				<label for="title" class="text-right w-1/3 mr-6">Title</label>
				<input type="text" name="title" value="{{ old('title') }}" class="flex-1 border-2 rounded p-2" required>
			</div>
			<div class="flex items-center mb-5">
				<label for="title" class="text-right w-1/3 mr-6">Target</label>
				<span class="mr-2">£</span>
				<input type="text" name="target" value="{{ old('target') }}" class="flex-1 border-2 rounded p-2" required>
			</div>
			<div class="flex items-start mb-5">
				<label for="description" class="text-right w-1/3 mr-6">Description</label>
				<textarea name="description" class="flex-1 border-2 rounded p-2" rows="6" placeholder="Description">{{ old('description') }}</textarea>
			</div>

			<div class="flex items-center justify-end">
				<div class="w-2/3 pl-6">
					<button class="px-6 py-2 bg-blue-500 text-white font-bold" type="submit">Create</button>
				</div>
			</div>
		</form>

	</div>	

</div>

@endsection