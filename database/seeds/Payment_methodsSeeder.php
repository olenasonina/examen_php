<?php

use Illuminate\Database\Seeder;
use App\Payment_method;

class Payment_methodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'prepayment', 'name' => 'предоплата', 'translit' => 'predoplata', 'available' => 'yes'],
        ['alias' => 'upon_shipment', 'name' => 'по факту отгрузки', 'translit' => 'po_faktu_otgruzki', 'available' => 'yes'],
        ['alias' => 'deferment_of_payment', 'name' => 'отсрочка платежа', 'translit' => 'otsrochka_platezha', 'available' => 'yes']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Payment_method::create($value);
        }
    }
}
