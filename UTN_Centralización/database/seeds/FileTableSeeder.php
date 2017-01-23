<?php

use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\File::class)->create([
        'num_file' => '4334 A' 
        ]);
        factory(App\File::class)->create([
        'num_file' => '923 R' 
        ]);
    }
}
