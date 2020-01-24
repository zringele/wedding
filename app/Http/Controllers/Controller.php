<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addGuest(Request $request) {
    	Guest::create($request->all());
	}

	public function getGuests($pass)
	{
		if ($pass === env('PASS')) {
			return Guest::all();
		} else {
			echo "NOPE";
		}
	}
}
