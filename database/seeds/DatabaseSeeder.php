<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Category;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 * Use firstOrCreate to make seeds idempotent
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// Create the categories
                $volcano = Category::firstOrCreate(['name'=>'Volcanoes']);
                $poi = Category::firstOrCreate(['name'=>'POI']);

                $v_id = $volcano->id;
                $p_id = $poi->id;

                ### Volcano Seeds ###
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Lassen Peak',
                        'lat'           => 40.4881,
                        'lon'           => -121.5050,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Colima',
                        'lat'           => 19.0967,
                        'lon'           => -103.9608,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => "Lō'ihi Seamount",
                        'lat'           => 18.9082,
                        'lon'           => -155.2645,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Mount Fuji',
                        'lat'           => 35.3608,
                        'lon'           => 138.7272,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Mount Hood',
                        'lat'           => 45.3735,
                        'lon'           => -121.6959,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Mount St. Helens',
                        'lat'           => 46.1912,
                        'lon'           => -122.1944,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Mount Erebus',
                        'lat'           => -77.5297,
                        'lon'           => 167.1533,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Mount Etna',
                        'lat'           => 37.755,
                        'lon'           => 14.995,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Planchón-Peteroa',
                        'lat'           => -35.24,
                        'lon'           => -70.57,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Copahue',
                        'lat'           => -37.85,
                        'lon'           =>  -71.1666,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Eyjafjallajökull',
                        'lat'           => 63.62,
                        'lon'           => -19.6133,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Bárðarbunga',
                        'lat'           => 64.641,
                        'lon'           => -17.528,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $v_id,
                        'name'          => 'Barren Island',
                        'lat'           => 12.2777,
                        'lon'           => 93.8583,
                ]);

                ### POI Seeds ###
                Location::firstOrCreate([
                        'category_id'   => $p_id,
                        'name'          => 'Eiffel Tower',
                        'lat'           => 48.8582,
                        'lon'           => 2.2945,
                ]);
                Location::firstOrCreate([
                        'category_id'   => $p_id,
                        'name'          => 'Washington Monument',
                        'lat'           => 38.8894,
                        'lon'           => -77.0352,
                ]);
	}

}
