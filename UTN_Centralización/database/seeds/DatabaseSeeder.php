<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(UserEntityTableSeeder::class);
        $this->call(WatersourceTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(CantonTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(ParameterTableSeeder::class);
        $this->call(ParameterlevelTableSeeder::class);
        $this->call(ResolutionTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(FiletypeTableSeeder::class);
        $this->call(ViabilityTableSeeder::class);
        $this->call(ConcessionTableSeeder::class);
        $this->call(SamplingsiteTableSeeder::class);
        $this->call(FlowmeasurementTableSeeder::class);
        $this->call(AnalysisTableSeeder::class);
        $this->call(SamplingTableSeeder::class);
        $this->call(RecordTableSeeder::class);
        $this->call(Concession_WatersourceTableSeeder::class);
        Model::reguard();
    }
}
