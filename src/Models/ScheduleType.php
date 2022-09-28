<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Database\Factories\ScheduleTypeFactory;
use Marcusmyers\TeamManager\Models\Schedule;

class ScheduleType extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'schedule_types';

    public function schedules()
    {
        return $this->hasMany('Marcusmyers\TeamManager\Models\Schedule');
    }

    public static function newFactory()
    {
        return ScheduleTypeFactory::new();
    }
}
