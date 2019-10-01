<?php

namespace Marcusmyers\TeamManager\Tests;

use Marcusmyers\TeamManager\TeamManagerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function setUp(): void
	{
		parent::setUp();

		$this->withFactories(__DIR__.'/../database/factories');
	}
	
	protected function getPackageProviders($app)
	{
	    return [ TeamManagerServiceProvider::class ];
	}

	protected function getEnvironmentSetup($app)
	{
		include_once __DIR__.'/../database/migrations/create_athletes_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_coaches_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_teams_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_athlete_team_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_coach_team_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_schedules_table.php.stub';
		include_once __DIR__.'/../database/migrations/create_schedule_types_table.php.stub';

		(new \CreateAthletesTable)->up();
		(new \CreateCoachesTable)->up();
		(new \CreateTeamsTable)->up();
		(new \CreateAthleteTeamTable)->up();
		(new \CreateCoachTeamTable)->up();
		(new \CreateSchedulesTable)->up();
		(new \CreateScheduleTypesTable)->up();
	}
}