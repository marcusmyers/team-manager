<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Illuminate\Support\Carbon;
use Marcusmyers\TeamManager\Models\Schedule;
use Marcusmyers\TeamManager\Models\ScheduleType;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class ScheduleTest extends TestCase
{
	/** @test */
	public function it_can_access_the_database()
	{
	    $team = factory(Team::class)->create();

	    $schedule = factory(Schedule::class)->create(['team_id' => $team->id]);

	    $newSchedule = Schedule::findOrFail($schedule->id);

	    $this->assertSame($newSchedule->id, $schedule->id);
	    $this->assertSame($newSchedule->team->id, $team->id);
	}

	/** @test */
	public function it_can_properly_parse_the_team_name()
	{
	    $team = factory(Team::class)->create();

	    $schedule = factory(Schedule::class)->create(['team_id' => $team->id]);

	    $newSchedule = Schedule::findOrFail($schedule->id);

	    $this->assertSame($newSchedule->team->name, $team->name);
	}
}