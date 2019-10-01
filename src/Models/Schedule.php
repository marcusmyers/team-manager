<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Models\ScheduleType;

class Schedule extends Model
{
	protected $guarded = [];
	protected $table = 'schedules';

	public function team()
	{
		return $this->belongsTo('Marcusmyers\TeamManager\Models\Team');
	}

	public function schedule_types()
	{
		return $this->belongsTo('Marcusmyers\TeamManager\Models\ScheduleType');
	}
}