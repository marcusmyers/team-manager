<div>
	@includeWhen($athlete->avatar != "", 'partials.avatar', ['athlete' => $athlete])
	<h1>{{ $athlete->name }}</h1>
</div>