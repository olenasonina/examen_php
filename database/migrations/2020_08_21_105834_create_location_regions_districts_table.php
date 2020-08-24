<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationRegionsDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_regions_districts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->comment('PK');
            $table->unsignedBigInteger('region_id')->comment('FK');
            $table->foreign('region_id')->references('id')->on('location_regions')->onDelete('cascade');
            $table->string('alias',32)->comment('for the system use, only');
            $table->string('name',32)->comment('on the russian language');
            $table->string('translit',32)->comment('for SEO and marketing');
            $table->enum('available', ['yes', 'no'])->default('no')->comment('display on the site');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_regions_districts');
    }
}
