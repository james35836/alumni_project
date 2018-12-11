<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Self::groups();
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
                'email' => $faker->email,
                'group_id' => 1,
	            'password' => bcrypt('secret'),
	        ]);
	    }
    }

    public static function groups()
    {
        if (DB::table('groups')->count()<= 0) 
        {
            $start  = 1973;
            $end    = 1974;
            for($i = 0; $i <= 60; $i++)
            {
                $year_start  = $start + $i;
                $year_end    = $end + $i;
                $years       = $year_start."-".$year_end;


                DB::table('groups')->insert([
                    'id' => $i + 1,
                    'name' => "BATCH '". $year_end,
                    'year' => $years,
                ]);
                
            }
        }
    }

    
}
