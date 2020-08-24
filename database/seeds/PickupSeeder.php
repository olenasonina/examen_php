<?php

use Illuminate\Database\Seeder;
use App\Pickup;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'from_the_field', 'name' => 'с поля', 'translit' => 's_polya', 'available' => 'yes'],
        ['alias' => 'from_the_household', 'name' => 'из хозяйства', 'translit' => 'iz_khozyaystva', 'available' => 'yes'],
        ['alias' => 'from_stock', 'name' => 'со склада', 'translit' => 'so_sklada', 'available' => 'yes'],
        ['alias' => 'at_the_elevator', 'name' => 'на элеваторе', 'translit' => 'na_elevatore', 'available' => 'yes'],
        ['alias' => 'at_the_elevator_according_to_the_census', 'name' => 'на элеваторе, по переписи', 'translit' => 'na_elevatore_po_perepisi', 'available' => 'yes'],
        ['alias' => 'on_the_terminal', 'name' => 'на терминале', 'translit' => 'na terminale', 'available' => 'yes']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Pickup::create($value);
        }
    }
}
