<?php

namespace Marcusmyers\TeamManager\Http\Controllers;

use Illuminate\Routing\Controller;
use Marcusmyers\TeamManager\Models\Coach;

class GetCoach extends Controller
{
	public function __invoke($id)
	{
		return view('team-manager::coaches.show', [ 'coach' => Coach::findOrFail($id)]);
	}
}