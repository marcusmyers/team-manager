<?php

namespace Marcusmyers\TeamManager\Tests\Feature;

use Marcusmyers\TeamManager\Models\Coach;
use Marcusmyers\TeamManager\Tests\TestCase;

class CoachTest extends TestCase
{
	/** @test */
	public function the_route_can_be_accessed()
	{
		$coach = new Coach();
		$coach->name = 'Mark Myers';
		$coach->save();

	    $response = $this->get('/coach/'.$coach->id);

	    $response->assertStatus(200)
	    	->assertSee('Mark Myers');
	}
}