<h1>{{ $team->name }}</h1>
<h2>Coach: {{ $team->coaches()->first()->name }}</h2>
<h2>Members {{ $team->athletes()->count() }}</h2>

<h2>Practice Schedule</h2>

<h2>Game Schedule</h2>