<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Illuminate\Support\Carbon;
use Marcusmyers\TeamManager\Models\Athlete;
use Marcusmyers\TeamManager\Models\Coach;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class TeamTest extends TestCase
{
    protected $team;

    public function setUp(): void
    {
        parent::setUp();

        $this->team = new Team();
        $this->team->name = 'Da Bulls';
        $this->team->active = true;
        $this->team->save();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $newTeam = Team::find($this->team->id);

        $this->assertSame($newTeam->name, 'Da Bulls');
    }

    /** @test */
    public function it_can_get_active_teams()
    {
        $newTeam = Team::active()->get();

        $this->assertSame($newTeam->first()->name, 'Da Bulls');
    }

    /** @test */
    public function it_can_have_multiple_coaches()
    {
        $team = $this->team;
        Coach::factory()->count( 3)
            ->create()
            ->each(function ($coach) use ($team) {
                $coach->teams()->attach($team->id);
            });

        $newTeam = Team::find($this->team->id);

        $this->assertEquals($newTeam->coaches()->count(), 3);
    }

    /** @test */
    public function it_can_have_big_team_of_athletes()
    {
        $team = $this->team;

        Athlete::factory()->count( 50)
            ->create()
            ->each( function ($athlete) use ($team) {
                $athlete->teams()->attach($team->id);
            });

        $newTeam = Team::find($this->team->id);

        $this->assertEquals($newTeam->athletes()->count(), 50);
    }
}
