<?php

use Illuminate\Database\Seeder;
use App\Incoterm;

class IncotermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $array = array(
        ['group_id' => '1','alias' => 'exw','abbr' => 'EXW','term_en' => 'ex works','specification' => 'франко-склад, франко-завод: товар забирается покупателем с указанного в договоре склада продавца, оплата экспортных пошлин вменяется в обязанность покупателю','type of transport' => 'any','available' => 'yes'],
        ['group_id' => '2','alias' => 'fca','abbr' => 'FCA','term_en' => 'free carrier','specification' => 'франко-перевозчик: товар доставляется основному перевозчику заказчика к указанному в договоре терминалу отправления, экспортные пошлины уплачивает продавец','type of transport' => 'any','available' => 'yes',],
        ['group_id' => '2','alias' => 'fas','abbr' => 'FAS','term_en' => 'free alongside ship','specification' => 'товар доставляется к судну покупателя, в договоре указывается порт погрузки, перевалку и погрузку оплачивает покупатель','type of transport' => 'water','available' => 'yes'],
        ['group_id' => '2','alias' => 'fob','abbr' => 'FOB','term_en' => 'free on board','specification' => 'товар отгружается на судно покупателя, перевалку оплачивает продавец.','type of transport' => 'water','available' => 'yes'],
        ['group_id' => '3','alias' => 'cpt','abbr' => 'CPT','term_en' => 'carriage paid to…','specification' => 'товар доставляется основному перевозчику заказчика, основную перевозку до указанного в договоре терминала прибытия оплачивает продавец, расходы по страховке несёт покупатель, импортную растаможку и доставку с терминала прибытия основного перевозчика осуществляет покупатель','type of transport' => 'any','available' => 'yes'],
        ['group_id' => '3','alias' => 'cip','abbr' => 'CIP','term_en' => 'carriage and insurance paid to…','specification' => 'то же, что CPT (а именно: товар доставляется основному перевозчику заказчика, основную перевозку до указанного в договоре терминала прибытия оплачивает продавец, расходы по страховке несёт покупатель, импортную растаможку и доставку с терминала прибытия основного перевозчика осуществляет покупатель), но основная перевозка страхуется продавцом','type of transport' => 'any','available' => 'yes'],
        ['group_id' => '3','alias' => 'cfr','abbr' => 'CFR','term_en' => 'cost and freight','specification' => 'товар доставляется до указанного в договоре порта назначения покупателя, страховку основной перевозки, разгрузку и перевалку оплачивает покупатель','type of transport' => 'water','available' => 'yes'],
        ['group_id' => '3','alias' => 'cif','abbr' => 'CIF','term_en' => 'cost, Insurance and Freight','specification' => 'то же, что CFR (а именно: товар доставляется до указанного в договоре порта назначения покупателя, страховку основной перевозки, разгрузку и перевалку оплачивает покупатель), но основную перевозку страхует продавец','type of transport' => 'water','available' => 'yes'],
        ['group_id' => '4','alias' => 'dat','abbr' => 'DAT','term_en' => 'delivered at terminal','specification' => 'поставка до указанного в договоре импортного таможенного терминала оплачена, то есть экспортные платежи и основную перевозку, включая страховку оплачивает продавец, таможенная очистка по импорту осуществляется покупателем','type of transport' => 'any','available' => 'yes'],
        ['group_id' => '4','alias' => 'dap','abbr' => 'DAP','term_en' => 'delivered at place','specification' => 'поставка в место назначения, указанное в договоре, импортные пошлины и местные налоги оплачиваются покупателем','type of transport' => 'any','available' => 'yes'],
        ['group_id' => '4','alias' => 'ddp','abbr' => 'DDP','term_en' => 'delivered duty paid','specification' => 'товар доставляется заказчику в место назначения, указанное в договоре, очищенный от всех таможенных пошлин и рисков','type of transport' => 'any','available' => 'yes']
    );

    public function run()
    {
        foreach($this->array as $value) {
            Incoterm::create($value);
        }
    }
}
