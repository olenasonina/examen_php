<?php

use Illuminate\Database\Seeder;
use App\Crop;

class CropsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
       ['category_id' => '1','alias' => 'corn','name' => 'кукуруза','translit' => 'kukuruza','available' => 'yes'],
       ['category_id' => '1','alias' => 'wheat','name' => 'пшеница','translit' => 'pshenitsa','available' => 'yes'],
       ['category_id' => '1','alias' => 'barley','name' => 'ячмень','translit' => 'yachmen','available' => 'yes'],
       ['category_id' => '1','alias' => 'buckwheat','name' => 'гречиха','translit' => 'grechikha','available' => 'yes'],
       ['category_id' => '1','alias' => 'millet','name' => 'просо','translit' => 'proso','available' => 'yes',],
       ['category_id' => '1','alias' => 'rye','name' => 'рожь','translit' => 'rozh','available' => 'yes'],
       ['category_id' => '1','alias' => 'oats','name' => 'овес','translit' => 'oves','available' => 'yes'],
       ['category_id' => '2','alias' => 'sunflower','name' => 'подсолнечник','translit' => 'podsolnechnik','available' => 'yes'],
       ['category_id' => '2','alias' => 'rape','name' => 'рапс','translit' => 'raps','available' => 'yes'],
       ['category_id' => '3','alias' => 'soybean','name' => 'соя','translit' => 'soya','available' => 'yes'],
       ['category_id' => '3','alias' => 'peas','name' => 'горох','translit' => 'gorokh','available' => 'yes']
    );
    public function run()
    {
        foreach($this->array as $value) {
            Crop::create($value);
        }
    }
}
