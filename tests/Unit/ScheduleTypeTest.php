<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Illuminate\Support\Carbon;
use Marcusmyers\TeamManager\Models\Schedule;
use Marcusmyers\TeamManager\Models\ScheduleType;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class ScheduleTypeTest extends TestCase
{
	/** @test */
	public function it_can_access_the_database()
	{
	    $team = factory(Team::class)->create();

	    $schedule_type = factory(ScheduleType::class)->create(['name' => 'game']);

	    $schedule1 = factory(Schedule::class)->create([
	    	'team_id' => $team->id, 
	    	'schedule_type_id' => $schedule_type->id, 
	    	'schedule_date_time' => Carbon::now()->addMonth()
	    ]);
	    $schedule2 = factory(Schedule::class)->create([
	    	'team_id' => $team->id, 
	    	'schedule_type_id' => $schedule_type->id,
	    	'schedule_date_time' => Carbon::now()->addMonth(2)
	    ]);

	    $newScheduleType = ScheduleType::findOrFail($schedule_type->id);

	    $this->assertSame($newScheduleType->schedules->count(), 2);
	}
}