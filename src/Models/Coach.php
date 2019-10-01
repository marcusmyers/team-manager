<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
	protected $guarded = [];
	protected $table = 'coaches';

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
}