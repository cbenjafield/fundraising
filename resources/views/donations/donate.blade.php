@extends('layouts.app')
@section('title', "Donate to: {$campaign->title}")

@section('content')

<div class="w-full py-6 border-b flex items-center">
	<div class="flex-1 mr-10">
		<h1 class="text-3xl font-bold text-gray-800">Donate to: <a href="{{ $campaign->url() }}" class="text-purple-500 hover:underline">{{ $campaign->title }}</a></h1>
	</div>
	<div class="flex items-center justify-end">
		
	</div>
</div>
<div class="w-full flex justify-center py-8">
	
	<div class="w-2/3">
		
		<form action="{{ $campaign->url('donate') }}" method="POST" id="donateForm">
			@csrf
			<div class="w-full bg-white p-4 rounded shadow">

				<input type="hidden" name="card_token" value="" id="card_token">
				
				<div class="mb-5 text-center">
					<label for="amount" class="block font-bold mb-2">Please enter the amount to donate</label>
					<div class="flex items-center">
						<span class="bg-blue-300 text-white font-bold px-4 h-12 flex items-center">£</span>
						<input type="number" name="amount" id="amount" class="h-12 px-4 text-lg text-gray-800 flex-1 border">
					</div>
				</div>

				<button type="submit" class="px-4 py-2 text-white bg-blue-600 font-bold">Donate Now</button>

			</div>
		</form>

	</div>

</div>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
/*var stripe = Stripe('{{ env('STRIPE_KEY') }}');
var elements = stripe.elements();

// Set up Stripe.js and Elements to use in checkout form
var style = {
  base: {
    color: "#32325d",
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});

var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function(ev) {
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: '{{ auth()->user()->name  }}',
        email: '{{ auth()->user()->email }}'
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
      alert("Failed payment. You're a mug")
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        console.log(result);
      }
    }
  });
});*/
</script>
@endsection