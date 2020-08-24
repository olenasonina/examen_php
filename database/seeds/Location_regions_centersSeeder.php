<?php

use Illuminate\Database\Seeder;
use App\Location_region_center;

class Location_regions_centersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['region_id' => '1','alias' => 'Vinnitsa','name' => 'Винница','translit' => 'Vinnitsa'],
        ['region_id' => '2','alias' => 'Odessa','name' => 'Одесса','translit' => 'Odessa'],
        ['region_id' => '3','alias' => 'Poltava','name' => 'Полтава','translit' => 'Poltava'],
        ['region_id' => '4','alias' => 'Rovno','name' => 'Ровно','translit' => 'Rovno'],
        ['region_id' => '5','alias' => 'Sumy','name' => 'Сумы','translit' => 'Sumy'],
        ['region_id' => '6','alias' => 'Ternopol','name' => 'Тернополь','translit' => 'Ternopol'],
        ['region_id' => '7','alias' => 'Kharkov','name' => 'Харьков','translit' => 'Kharkov'],
        ['region_id' => '8','alias' => 'Kherson','name' => 'Херсон','translit' => 'Kherson'],
        ['region_id' => '9','alias' => 'Khmelnitskiy','name' => 'Хмельницкий','translit' => 'Khmelnitskiy'],
        ['region_id' => '10','alias' => 'Cherkassy','name' => 'Черкассы','translit' => 'Cherkassy'],
        ['region_id' => '11','alias' => 'Chernigov','name' => 'Чернигов','translit' => 'Chernigov'],
        ['region_id' => '12','alias' => 'Nikolayev','name' => 'Николаев','translit' => 'Nikolayev'],
        ['region_id' => '13','alias' => 'Lvov','name' => 'Львов','translit' => 'Lvov'],
        ['region_id' => '14','alias' => 'Lugansk','name' => 'Луганск','translit' => 'Lugansk'],
        ['region_id' => '15','alias' => 'Lutsk','name' => 'Луцк','translit' => 'Lutsk'],
        ['region_id' => '16','alias' => 'Dnepr','name' => 'Днепр','translit' => 'Dnepr'],
        ['region_id' => '17','alias' => 'Donetsk','name' => 'Донецк','translit' => 'Donetsk'],
        ['region_id' => '18','alias' => 'Zhitomir','name' => 'Житомир','translit' => 'Zhitomir'],
        ['region_id' => '19','alias' => 'Uzhhorod','name' => 'Ужгород','translit' => 'Uzhgorod'],
        ['region_id' => '20','alias' => 'Zaporozhye','name' => 'Запорожье','translit' => 'Zaporozhye'],
        ['region_id' => '21','alias' => 'Ivano_Frankovsk','name' => 'Ивано-Франковск','translit' => 'Ivano-Frankovsk'],
        ['region_id' => '22','alias' => 'Kiyev','name' => 'Киев','translit' => 'Kiyev'],
        ['region_id' => '23','alias' => 'Kropivnitskiy','name' => 'Кропивницкий','translit' => 'Kropivnitskiy'],
        ['region_id' => '24','alias' => 'Chernovtsy','name' => 'Черновцы','translit' => 'Chernovtsy'],
        ['region_id' => '26','alias' => 'Simferopol','name' => 'Симферополь','translit' => 'Simferopol']
    );
    public function run()
    {
        foreach($this->array as $value) {
            Location_region_center::create($value);
        }
    }
}
