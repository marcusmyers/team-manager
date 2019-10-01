<?php

use Illuminate\Database\Seeder;

class AthletesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('athletes')->insert([
        	'name' => 'Mark Myers'
        ]);
    }
}