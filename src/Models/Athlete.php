<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Models\Team;

class Athlete extends Model
{
	protected $guarded = [];
	protected $table = 'athletes';

	protected $dates = [
		'birthday',
	];

	public function formattedBirthday()
	{
		return $this->birthday->format('F j, Y');
	}

	public function teams()
	{
		return $this->belongsToMany('Marcusmyers\TeamManager\Models\Team');
	}

	public function getFirstNameAttribute()
	{
		return ucfirst(collect(explode(' ', $this->name))->first());
	}

	public function getLastNameAttribute()
	{
		return ucfirst(collect(explode(' ', $this->name))->last());
	}

	public function scopeActive($query)
	{
		return $query->where('active', 1);
	}
}