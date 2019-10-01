<?php

namespace Marcusmyers\TeamManager\Http\Controllers;

use Illuminate\Routing\Controller;
use Marcusmyers\TeamManager\Models\Team;

class GetTeam extends Controller
{
	public function __invoke($id)
	{
		return view('team-manager::teams.show', [ 'team' => Team::findOrFail($id)]);
	}
}