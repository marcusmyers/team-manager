<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Database\Factories\ScheduleFactory;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Models\ScheduleType;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'schedules';
    protected $dates = ['schedule_date_time','end_time'];

    public function team()
    {
        return $this->belongsTo('Marcusmyers\TeamManager\Models\Team');
    }

    public function schedule_types()
    {
        return $this->belongsTo('Marcusmyers\TeamManager\Models\ScheduleType', 'schedule_type_id');
    }

    public static function newFactory()
    {
        return ScheduleFactory::new();
    }
}
