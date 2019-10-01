<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Models\Athlete;

class Team extends Model
{
	protected $guarded = [];
	protected $table = 'teams';
	
	public function athletes()
	{
		return $this->belongsToMany('Marcusmyers\TeamManager\Models\Athlete');
	}

	public function coaches()
	{
		return $this->belongsToMany('Marcusmyers\TeamManager\Models\Coach');
	}

	public function schedules()
	{
		return $this->hasMany('Marcusmyers\TeamManager\Models\Schedule');
	}
}