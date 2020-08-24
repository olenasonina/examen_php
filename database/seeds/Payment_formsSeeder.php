<?php

use Illuminate\Database\Seeder;
use App\Payment_form;

class Payment_formsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'cash', 'name' => 'наличные', 'translit' => 'nalichnyye'],
        ['alias' => 'noncash', 'name' => 'безналичные', 'translit' => 'beznalichnyye']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Payment_form::create($value);
        }
    }
}
