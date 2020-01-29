<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentMethod;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use App\Campaign;
use App\Donation;
use App\Card;

class DonationController extends Controller
{
    
	public function donate(Campaign $campaign)
	{
		return view('donations.donate', compact('campaign'));
	}

	public function paymentIntent(Campaign $campaign)
	{
		$this->validate(request(), [
			'amount' => ['required', 'numeric']
		]);

		Stripe::setApiKey(env('STRIPE_SECRET'));

		$intent = PaymentIntent::create([
		    'amount' => (request('amount') * 100),
		    'currency' => 'gbp',
		]);

		return view('donations.pay', compact('intent', 'campaign'));
	}

	public function completePayment(Campaign $campaign)
	{
		Stripe::setApiKey(env('STRIPE_SECRET'));

		$intent = PaymentIntent::retrieve(request('intent_token'));
		$paymentMethod = PaymentMethod::retrieve($intent->payment_method);

		$card = auth()->user()->cards()->create([
			'fingerprint' => $paymentMethod->card->fingerprint,
			'stripe_id' => $paymentMethod->id,
			'last_four' => $paymentMethod->card->last4,
			'exp_month' => $paymentMethod->card->exp_month,
			'exp_year' => $paymentMethod->card->exp_year,
		]);

		$donations = auth()->user()->donations()->create([
			'campaign_id' => $campaign->id,
			'billable_id' => $card->id, // This should be the CARD id -> my bad!
			'amount' => ($intent->amount / 100),
			'is_anonymous' => 0,
		]);

		return redirect($campaign->url());
	}

}
