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
		
		<form action="{{ $campaign->url('complete-donation') }}" method="POST" id="donateForm">
			@csrf
			<div class="w-full bg-white p-4 rounded shadow">

				<input type="hidden" name="intent_token" value="" id="intent_token">
				
				<div id="card-element">
				  <!-- Elements will create input elements here -->
				</div>

				<!-- We'll put the error messages in this element -->
				<div id="card-errors" role="alert"></div>

				<button id="paymentButton" class="px-4 py-2 text-white bg-blue-600 font-bold">Donate Now</button>

			</div>
		</form>

	</div>

</div>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('{{ env('STRIPE_KEY') }}');
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

var submitButton = document.getElementById('paymentButton');

submitButton.addEventListener('click', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment('{{ $intent->client_secret }}', {
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
        document.querySelector('#intent_token').value = result.paymentIntent.id;
        var form = document.getElementById('donateForm');
        form.submit();
      }
    }
  });
});
</script>
@endsection