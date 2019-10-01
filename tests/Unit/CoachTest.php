<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Illuminate\Support\Carbon;
use Marcusmyers\TeamManager\Models\Athlete;
use Marcusmyers\TeamManager\Models\Coach;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class CoachTest extends TestCase
{
	/** @test */
	public function it_can_access_the_database()
	{
	    $coach = factory(Coach::class)->create(['name' => 'Mark Myers']);

	    $newCoach = Coach::find($coach->id);

	    $this->assertSame($newCoach->name, 'Mark Myers');
	}

	/** @test */
	public function it_can_properly_parse_the_coaches_name()
	{
		$coach = factory(Coach::class)->create(['name' => 'Mark Myers']);
	    $newCoach = Coach::find($coach->id);

	    $this->assertSame($newCoach->first_name, 'Mark');
	    $this->assertSame($newCoach->last_name, 'Myers');
	}

	/** @test */
	public function it_can_be_added_to_a_team()
	{
	    $team = factory(Team::class)->create(['name' => 'Da Bulls']);
	    $coach = factory(Coach::class)->create(['name' => 'Mark Myers']);

	    $team->coaches()->attach($coach->id);

	    $this->assertSame($team->coaches()->first()->name, 'Mark Myers');
	}
}