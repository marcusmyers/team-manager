<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Models\Schedule;

class ScheduleType extends Model
{
	protected $guarded = [];
	protected $table = 'schedule_types';

	public function schedules()
	{
		return $this->hasMany('Marcusmyers\TeamManager\Models\Schedule');
	}
}