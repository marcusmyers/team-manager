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
		$team = factory(Team::class)->create(['name' => 'Da Bulls']);
		$coach = factory(Coach::class)->create(['name' => 'Mark Myers']);
		
		$team->coaches()->attach($coach->id);
	    $athletes = factory(Athlete::class, 15)
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