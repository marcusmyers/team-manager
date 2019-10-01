<?php

namespace Marcusmyers\TeamManager\Tests\Feature;

use Marcusmyers\TeamManager\Models\Athlete;
use Marcusmyers\TeamManager\Tests\TestCase;

class AthleteTest extends TestCase
{
	/** @test */
	public function the_route_can_be_accessed()
	{
		$athlete = new Athlete();
		$athlete->name = 'Mark Myers';
		$athlete->save();

	    $response = $this->get('/athlete/'.$athlete->id);

	    $response->assertStatus(200)
	    	->assertSee('Mark Myers');
	}
}