<?php

use Illuminate\Database\Seeder;

class ParameterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Parameter::class)->create([
        'parameter' => 'Coliforme fecal',
        'unit'=>'NMP/100 mL',
        'recommended_value'=>'',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Escherichia coli',
        'unit'=>'NMP/100 mL',
        'recommended_value'=>'',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Color aparente',
        'unit'=>'mg/L (U - Pt-Co)',
        'recommended_value'=>'5',
        'maximum_allowable'=>'225'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Turbiedad',
        'unit'=>'UNT',
        'recommended_value'=>'<1',
        'maximum_allowable'=>'25'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Olor',
        'unit'=>'',
        'recommended_value'=>'Debe ser aceptable',
        'maximum_allowable'=>'Debe ser aceptable'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Sabor',
        'unit'=>'',
        'recommended_value'=>'Debe ser aceptable',
        'maximum_allowable'=>'Debe ser aceptable'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Temperatura',
        'unit'=>'C',
        'recommended_value'=>'18',
        'maximum_allowable'=>'30'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'pH',
        'unit'=>'Valor pH',
        'recommended_value'=>'6,5',
        'maximum_allowable'=>'8,5'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Conductividad',
        'unit'=>'μS/cm',
        'recommended_value'=>'400',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cloro Residual Libre',
        'unit'=>'mg/L',
        'recommended_value'=>'0,3',
        'maximum_allowable'=>'0,6'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cloro Residual Combinado',
        'unit'=>'mg/L',
        'recommended_value'=>'1,0',
        'maximum_allowable'=>'1,8'
        ]);


        factory(App\Parameter::class)->create([
        'parameter' => 'Dureza Total',
        'unit'=>'mg/L CaCO3',
        'recommended_value'=>'400',
        'maximum_allowable'=>'500'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cloruro',
        'unit'=>'mg/L CL-',
        'recommended_value'=>'25',
        'maximum_allowable'=>'250'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Fluoruro',
        'unit'=>'mg/L F-',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,7'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Nitrato',
        'unit'=>'mg/L NO3-',
        'recommended_value'=>'25',
        'maximum_allowable'=>'50'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Sulfato',
        'unit'=>'mg/L SO4-2',
        'recommended_value'=>'25',
        'maximum_allowable'=>'250'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Aluminio',
        'unit'=>'mg/L Al+3',
        'recommended_value'=>'0,2',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Calcio',
        'unit'=>'mg/L Ca+2',
        'recommended_value'=>'100',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Magnesio',
        'unit'=>'mg/L Mg+2',
        'recommended_value'=>'30',
        'maximum_allowable'=>'50'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Sodio',
        'unit'=>'mg/L Na+',
        'recommended_value'=>'25',
        'maximum_allowable'=>'200'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Potasio',
        'unit'=>'mg/L K+',
        'recommended_value'=>'',
        'maximum_allowable'=>'10'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Hierro',
        'unit'=>'mg/L Fe',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,3'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Manganeso',
        'unit'=>'mg/L Mn',
        'recommended_value'=>'0,1',
        'maximum_allowable'=>'0,5'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Zinc',
        'unit'=>'mg/L Zn',
        'recommended_value'=>'',
        'maximum_allowable'=>'3,0'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cobre',
        'unit'=>'mg/L Cu',
        'recommended_value'=>'1,0',
        'maximum_allowable'=>'2,0'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Plomo',
        'unit'=>'mg/L Pb',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,01'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Nitrito',
        'unit'=>'mg/L NO2-',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,1'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Amonio',
        'unit'=>'mg/L NH4+',
        'recommended_value'=>'0,05',
        'maximum_allowable'=>'0,5'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Arsénico',
        'unit'=>'mg/L As',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,01'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cadmio',
        'unit'=>'mg/L Cd',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,003'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Cromo',
        'unit'=>'mg/L Cr',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,05'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Mercurio',
        'unit'=>'mg/L Hg',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,001'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Níquel',
        'unit'=>'mg/L Ni',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,02'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Antimonio',
        'unit'=>'mg/L Sb',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,005'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Selenio',
        'unit'=>'mg/L Se',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,01'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Sólidos totales',
        'unit'=>'',
        'recommended_value'=>'',
        'maximum_allowable'=>''
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Disueltos',
        'unit'=>'mg/L',
        'recommended_value'=>'',
        'maximum_allowable'=>'100'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Amonio',
        'unit'=>'mg/L NH4+',
        'recommended_value'=>'0,05',
        'maximum_allowable'=>'0,5'
        ]);
        factory(App\Parameter::class)->create([
        'parameter' => 'Sulfuro de Hidrógeno',
        'unit'=>'mg/L H2S',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,05'
        ]);
    }
}
