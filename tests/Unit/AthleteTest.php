<?php

namespace Marcusmyers\TeamManager\Tests\Unit;

use Illuminate\Support\Carbon;
use Marcusmyers\TeamManager\Models\Athlete;
use Marcusmyers\TeamManager\Models\Team;
use Marcusmyers\TeamManager\Tests\TestCase;

class AthleteTest extends TestCase
{
	protected $athlete;

	public function setUp(): void
	{
		parent::setUp();

		$this->athlete = new Athlete();
		$this->athlete->name = 'Mark Myers';
		$this->athlete->save();
	}

	/** @test */
	public function it_can_access_the_database()
	{
		$newAthlete = Athlete::find($this->athlete->id);

		$this->assertSame($newAthlete->name, 'Mark Myers');
	}

	/** @test */
	public function it_can_properly_set_the_email_address()
	{
	    $this->athlete->email = 'foo@example.com';
	    $this->athlete->save();

	    $newAthlete = Athlete::find($this->athlete->id);

	    $this->assertSame($newAthlete->email, 'foo@example.com');
	}
	
	/** @test */
	public function it_can_properly_set_the_birthday()
	{
	    $this->athlete->birthday = Carbon::parse('2014-05-30');
	    $this->athlete->save();

	    $newAthlete = Athlete::find($this->athlete->id);

	    $this->assertSame($newAthlete->birthday->toDateString(), '2014-05-30');
	    $this->assertSame($newAthlete->formattedBirthday(), 'May 30, 2014');
	}

	/** @test */
	public function it_can_properly_parse_the_athletes_name()
	{
	    $newAthlete = Athlete::find($this->athlete->id);

	    $this->assertSame($newAthlete->first_name, 'Mark');
	    $this->assertSame($newAthlete->last_name, 'Myers');
	}

	/** @test */
	public function the_athlete_can_be_added_to_a_team()
	{
	    $team = new Team();
	    $team->name = 'Da Bulls';
	    $team->save();

	    $this->athlete->teams()->attach($team->id);
	    $this->athlete->save();

	    $newAthlete = Athlete::find($this->athlete->id);
	    $this->assertSame($newAthlete->teams()->first()->name, 'Da Bulls');
	}
}