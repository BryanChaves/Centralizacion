<?php

use Illuminate\Database\Seeder;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	//Heliodoro A
    	
    	//Sampling 1
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '1',
        'value'=>'<1,8'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '2',
        'value'=>'<1,8'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '3',
        'value'=>'<0,5'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '4',
        'value'=>'1,16'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '7',
        'value'=>'20,5+-0,1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '1',
        'parameter_id' => '8',
        'value'=>'6,83'
        ]);
        //Sampling 2
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '12',
        'value'=>'47+-1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '13',
        'value'=>'2+-1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '14',
        'value'=>'<0,2'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '15',
        'value'=>'5+-1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '16',
        'value'=>'4+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '2',
        'parameter_id' => '17',
        'value'=>'8+-5'
        ]); 

        //Sampling 3
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '1',
        'value'=>'<1,10'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '2',
        'value'=>'<1,8'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '3',
        'value'=>'<0,10'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '4',
        'value'=>'0,20'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '7',
        'value'=>'21+-0,1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '3',
        'parameter_id' => '8',
        'value'=>'6,85'
        ]);

        //Sampling 4
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '12',
        'value'=>'46+-1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '13',
        'value'=>'2+-1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '14',
        'value'=>'<0,2'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '15',
        'value'=>'5,2+-1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '16',
        'value'=>'4+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '4',
        'parameter_id' => '17',
        'value'=>'8,2+-5'
        ]);

        //Sampling 5
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '1',
        'value'=>'<1,7'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '2',
        'value'=>'<1,8'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '3',
        'value'=>'<0,13'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '4',
        'value'=>'0,25'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '7',
        'value'=>'21,5+-0,1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '5',
        'parameter_id' => '8',
        'value'=>'6,84'
        ]);
        
        //Sampling 6
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '12',
        'value'=>'47,5+-1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '13',
        'value'=>'2,2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '14',
        'value'=>'<0,22'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '15',
        'value'=>'5,1+-1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '16',
        'value'=>'4+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '6',
        'parameter_id' => '17',
        'value'=>'8,1+-5'
        ]);

        //Sampling 7
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '1',
        'value'=>'nd'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '2',
        'value'=>'nd'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '3',
        'value'=>'2'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '4',
        'value'=>'0,1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '7',
        'value'=>'16,4+-0,10'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '7',
        'parameter_id' => '8',
        'value'=>'6,35'
        ]);

        //Sampling 8
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '12',
        'value'=>'30+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '13',
        'value'=>'0,95+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '14',
        'value'=>'0,13+-0,01'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '15',
        'value'=>'0,81+-0,08'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '16',
        'value'=>'13,36+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '8',
        'parameter_id' => '17',
        'value'=>'375'
        ]);

        //Sampling 9
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '1',
        'value'=>'<1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '2',
        'value'=>'<1'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '3',
        'value'=>'2,1'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '4',
        'value'=>'0,10'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '7',
        'value'=>'17+-0,10'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '9',
        'parameter_id' => '8',
        'value'=>'6,4'
        ]);

        //Sampling 110
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '12',
        'value'=>'31+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '13',
        'value'=>'0,96+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '14',
        'value'=>'0,13+-0,01'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '15',
        'value'=>'0,82+-0,08'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '16',
        'value'=>'13,6+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '10',
        'parameter_id' => '17',
        'value'=>'377'
        ]);

        //Sampling 11
    	//level 1
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '1',
        'value'=>'nd'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '2',
        'value'=>'nd'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '3',
        'value'=>'2,2'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '4',
        'value'=>'0,15'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '5',
        'value'=>'Aceptable'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '6',
        'value'=>'Aceptable'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '7',
        'value'=>'16,5+-0,10'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '11',
        'parameter_id' => '8',
        'value'=>'6,42'
        ]);

        //Sampling 12
        //level 2
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '12',
        'value'=>'30+-2'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '13',
        'value'=>'0,96+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '14',
        'value'=>'0,13+-0,01'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '15',
        'value'=>'0,80+-0,08'
        ]); 
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '16',
        'value'=>'13,7+-0,08'
        ]);
        factory(App\Record::class)->create([
        'sampling_id' => '12',
        'parameter_id' => '17',
        'value'=>'377'
        ]);
    }
}
