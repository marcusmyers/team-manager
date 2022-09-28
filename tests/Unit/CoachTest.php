<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Marcusmyers\TeamManager\Models\Coach;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class CoachTest extends TestCase
{
    /** @test */
    public function it_can_access_the_database()
    {
        $coach = Coach::factory()->create(['name' => 'Mark Myers']);

        $newCoach = Coach::find($coach->id);

        $this->assertSame($newCoach->name, 'Mark Myers');
    }

    /** @test */
    public function it_can_get_active_coaches()
    {
        $coach = Coach::factory()->create(['name' => 'Mark Myers']);

        $newCoach = Coach::active()->get();

        $this->assertSame($newCoach->first()->name, 'Mark Myers');
    }

    /** @test */
    public function it_can_properly_parse_the_coaches_name()
    {
        $coach = Coach::factory()->create(['name' => 'Mark Myers']);
        $newCoach = Coach::find($coach->id);

        $this->assertSame($newCoach->first_name, 'Mark');
        $this->assertSame($newCoach->last_name, 'Myers');
    }

    /** @test */
    public function it_can_be_added_to_a_team()
    {
        $team = Team::factory()->create(['name' => 'Da Bulls']);
        $coach = Coach::factory()->create(['name' => 'Mark Myers']);

        $team->coaches()->attach($coach->id);

        $this->assertSame($team->coaches()->first()->name, 'Mark Myers');
    }
}
