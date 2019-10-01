<?php

namespace Marcusmyers\TeamManager;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Marcusmyers\TeamManager\Http\Controllers\GetAthlete;
use Marcusmyers\TeamManager\Http\Controllers\GetCoach;
use Marcusmyers\TeamManager\Http\Controllers\GetTeam;

class TeamManagerServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([__DIR__.'/../resources/views' =>  resource_path('views/vendor/team-manager')]);

		if (! file_exists(database_path('factories/AthleteFactory.php'))) {
			$this->publishes([
				__DIR__ . '/../database/factories/AthleteFactory.php' => database_path('factories/AthleteFactory.php')
			], 'factories');
		}

		if (! file_exists(database_path('factories/CoachFactory.php'))) {
			$this->publishes([
				__DIR__ . '/../database/factories/CoachFactory.php' => database_path('factories/CoachFactory.php')
			], 'factories');
		}

		if (! file_exists(database_path('factories/TeamFactory.php'))) {
			$this->publishes([
				__DIR__ . '/../database/factories/TeamFactory.php' => database_path('factories/TeamFactory.php')
			], 'factories');
		}
		
		if (! class_exists('CreateAthletesTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_athletes_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_athletes_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateCoachesTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_coaches_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_coaches_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateTeamsTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_teams_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_teams_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateAthleteTeamTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_athlete_team_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_athlete_team_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateCoachTeamTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_coach_team_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_coach_team_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateSchedulesTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_schedules_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_schedules_table.php')
			], 'migrations');
		}

		if (! class_exists('CreateScheduleTypesTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_schedule_types_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_schedule_types_table.php')
			], 'migrations');
		}

		$this->loadViewsFrom(__DIR__ .'/../resources/views', 'team-manager');

		Route::get('/athlete/{athlete}', GetAthlete::class);
		Route::get('/team/{team}', GetTeam::class);
		Route::get('/coach/{coach}', GetCoach::class);
	}

	public function register()
	{
		
	}	
}