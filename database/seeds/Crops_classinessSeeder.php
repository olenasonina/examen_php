<?php

use Illuminate\Database\Seeder;
use App\Crops_class;

class Crops_classinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
       ['alias' => 'first','name' => 'первый','translit' => 'pervuy','number' => '1','available' => 'yes'],
       ['alias' => 'second','name' => 'второй','translit' => 'vtoroy','number' => '2','available' => 'yes'],
       ['alias' => 'third','name' => 'третий','translit' => 'tretiy','number' => '3','available' => 'yes'],
       ['alias' => 'fourth','name' => 'четвертый','translit' => 'chetvertuy','number' => '4','available' => 'yes'],
       ['alias' => 'fifth','name' => 'пятый','translit' => 'pyatuy','number' => '5','available' => 'yes'],
       ['alias' => 'sixth','name' => 'шестой','translit' => 'shestoy','number' => '6','available' => 'yes']
    );
    public function run()
    {
        foreach($this->array as $value) {
            Crops_class::create($value);
        }
    }
}
