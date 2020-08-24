<?php

use Illuminate\Database\Seeder;
use App\Crops_category;

class Crops_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
       ['alias' => 'cereals','name' => 'зерновые','translit' => 'zernovyye'],
       ['alias' => 'oilseeds','name' => 'масличные','translit' => 'maslichnyye'],
       ['alias' => 'beans','name' => 'бобовые','translit' => 'bobovyye']
    );
    public function run()
    {
        foreach($this->array as $value) {
            Crops_category::create($value);
        }
    }
}
