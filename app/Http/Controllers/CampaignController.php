<?php

namespace App\Http\Controllers;

use App\Http\Requests\Campaigns\CreateCampaignRequest;
use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
   	
    /**
     * Display a list of the user's campaigns
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$campaigns = auth()->user()
								->campaigns()
								->latest()
								->paginate(15);

		return view('campaigns.index', compact('campaigns'));
	}

	/**
	 * Show the form to create a new campaign.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('campaigns.create');
	}


	public function store(CreateCampaignRequest $request)
	{
		$campaign = auth()->user()
								->campaigns()
								->create($request->only([
									'title',
									'target',
									'description'
								]));

		return redirect($campaign->url())
							->with('success', 'Campaign created.');
	}

	public function show(Campaign $campaign)
	{
		return view('campaigns.show', compact('campaign'));
	}

}
