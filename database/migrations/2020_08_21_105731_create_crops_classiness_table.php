<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsClassinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops_classiness', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->comment('PK');
            $table->string('alias',8)->comment('for the system use, only');
            $table->string('name',16)->comment('on the russian language');
            $table->string('translit',16)->comment('for SEO and marketing');
            $table->unsignedTinyInteger('number')->comment('class of cereals number');
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
        Schema::dropIfExists('crops_classiness');
    }
}
