<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_statuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->comment('PK');
            $table->string('alias',32)->comment('for the system use, only');
            $table->string('name',32)->comment('on the russian language');
            $table->string('translit',32)->comment('for SEO and marketing');
            $table->mediumText('sense')->comment('what does mean this status on russian (for human eyes)');
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
        Schema::dropIfExists('offers_statuses');
    }
}
