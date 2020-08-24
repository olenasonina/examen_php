<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([Incoterms_groupsSeeder::class, IncotermsSeeder::class, Crops_categoriesSeeder::class, CropsSeeder::class,
                    Payment_formsSeeder::class, Payment_methodsSeeder::class, PickupSeeder::class, Seller_typesSeeder::class,
                    Offers_statusesSeeder::class, Crops_classinessSeeder::class, Location_regionsSeeder::class, Location_regions_centersSeeder::class,
                    Location_regions_districtsSeeder::class]);
    }
}
