<?php

use Illuminate\Database\Seeder;
use App\Location_region;

class Location_regionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['alias' => 'Vinnitskaya', 'name' => 'Винницкая', 'translit' => 'Vinnitskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Odesskaya', 'name' => 'Одесская', 'translit' => 'Odesskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Poltavskaya', 'name' => 'Полтавская', 'translit' => 'Poltavskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Rovenskaya', 'name' => 'Ровенская', 'translit' => 'Rovenskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Sumskaya', 'name' => 'Сумская', 'translit' => 'Sumskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Ternopolskaya', 'name' => 'Тернопольская', 'translit' => 'Ternopolskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Kharkovskaya', 'name' => 'Харьковская', 'translit' => 'Kharkovskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Khersonskaya', 'name' => 'Херсонская', 'translit' => 'Khersonskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Khmelnitskaya', 'name' => 'Хмельницкая', 'translit' => 'Khmelnitskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Cherkasskaya', 'name' => 'Черкасская', 'translit' => 'Cherkasskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Chernigovskaya', 'name' => 'Черниговская', 'translit' => 'Chernigovskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Nikolayevskaya', 'name' => 'Николаевская', 'translit' => 'Nikolayevskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Lvovskaya', 'name' => 'Львовская', 'translit' => 'Lvovskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Luganskaya', 'name' => 'Луганская', 'translit' => 'Luganskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Volynskaya', 'name' => 'Волынская', 'translit' => 'Volynskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Dnepropetrovskaya', 'name' => 'Днепропетровская', 'translit' => 'Dnepropetrovskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Donetskaya', 'name' => 'Донецкая', 'translit' => 'Donetskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Zhitomirskaya', 'name' => 'Житомирская', 'translit' => 'Zhitomirskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Zakarpatskaya', 'name' => 'Закарпатская', 'translit' => 'Zakarpatskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Zaporozhskaya', 'name' => 'Запорожская', 'translit' => 'Zaporozhskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Ivano-Frankovskaya', 'name' => 'Ивано-Франковская', 'translit' => 'Ivano-Frankovskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Kiyevskaya', 'name' => 'Киевская', 'translit' => 'Kiyevskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Kirovogradskaya', 'name' => 'Кировоградская', 'translit' => 'Kirovogradskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Chernovitskaya', 'name' => 'Черновицкая', 'translit' => 'Chernovitskaya', 'type' => 'region', 'available' => 'yes'],
        ['alias' => 'Kiyev', 'name' => 'Киев', 'translit' => 'Kiyev', 'type' => 'city', 'available' => 'yes'],
        ['alias' => 'ARK', 'name' => 'Автономная Республика Крым', 'translit' => 'ARK', 'type' => 'region', 'available' => 'no'],
        ['alias' => 'Sevastopol', 'name' => 'Севастополь', 'translit' => 'Sevastopol', 'type' => 'city', 'available' => 'no']
    );
    public function run()
    {
        foreach ($this->array as $value) {
            Location_region::create($value);
        }
    }
}
