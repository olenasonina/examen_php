<?php

use Illuminate\Database\Seeder;
use App\Offers_status;

class Offers_statusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'pending', 'name' => 'в ожидании', 'translit' => 'v_ozhidanii', 'sense' => 'ожидает модерации: добавл. ключевых слов для SEO, проверка оплаты, обзвон заказчика и др.', 'available' => 'yes'],
        ['alias' => 'published', 'name' => 'опубликовано', 'translit' => 'opublikovano', 'sense' => 'опубликовано и учавствует в поиске.', 'available' => 'yes'],
        ['alias' => 'archived', 'name' => 'архивировано', 'translit' => 'arkhivirovano', 'sense' => 'деактивировано, не учавствует в поиске.', 'available' => 'yes']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Offers_status::create($value);
        }
    }
}
