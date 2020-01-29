<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
	public function index()
	{
		return view('dashboard.index', [
			'user' => auth()->user(),
			'donations' => auth()->user()
									->donations()
									->latest()
									->take(10)
		]);
	}

}
