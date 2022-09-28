<?php

namespace Marcusmyers\TeamManager\Tests\Feature;

use Marcusmyers\TeamManager\Models\Athlete;
use Marcusmyers\TeamManager\Models\Coach;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class TeamTest extends TestCase
{
    /** @test */
    public function the_route_can_be_accessed()
    {
        $team = Team::factory()->create(['name' => 'Da Bulls']);
        $coach = Coach::factory()->create(['name' => 'Mark Myers']);

        $team->coaches()->attach($coach->id);
        $athletes = Athlete::factory()->count(15)
                        ->create()
                        ->each(function ($athlete) use ($team) {
                            $athlete->teams()->attach($team->id);
                        });

        $response = $this->get('/team/'.$team->id);

        $response->assertSee('Da Bulls')
                 ->assertSee('Mark Myers')
                 ->assertSee('15');
    }
}
