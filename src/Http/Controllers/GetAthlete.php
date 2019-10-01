<?php

namespace Marcusmyers\TeamManager\Http\Controllers;

use Illuminate\Routing\Controller;
use Marcusmyers\TeamManager\Models\Athlete;

class GetAthlete extends Controller
{
	public function __invoke($id)
	{
		return view('team-manager::athletes.show', [ 'athlete' => Athlete::findOrFail($id)]);
	}
}