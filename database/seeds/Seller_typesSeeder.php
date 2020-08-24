<?php

use Illuminate\Database\Seeder;
use App\Seller_type;

class Seller_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'farming', 'name' => 'фермерское хозяйство', 'translit' => 'fermerskoye_khozyaystvo', 'available' => 'yes'],
        ['alias' => 'trader', 'name' => 'зернотрейдер', 'translit' => 'treyder', 'available' => 'yes'],
        ['alias' => 'dealer', 'name' => 'посредник', 'translit' => 'posrednik', 'available' => 'yes'],
        ['alias' => 'private', 'name' => 'частное лицо', 'translit' => 'chastnoye', 'available' => 'yes']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Seller_type::create($value);
        }
    }
}
