<?php

use Illuminate\Database\Seeder;

class ResolutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        factory(App\Resolution::class)->create([
        'num_resolution' => 'R-4334A-2010-AGUAS-MINAE'
        ]);
        factory(App\Resolution::class)->create([
        'num_resolution' => 'R-923R-2008-AGUAS-MINAE'
        ]);
    }
}
