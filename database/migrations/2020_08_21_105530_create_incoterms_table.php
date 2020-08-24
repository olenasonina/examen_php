<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncotermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoterms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->comment('PK');
            $table->unsignedBigInteger('group_id')->comment('FK');
            $table->foreign('group_id')->references('id')->on('incoterms_groups')->onDelete('cascade');
            $table->char('alias',3)->comment('for the system use, only');
            $table->char('abbr',3)->comment('abbreviation on english (for human eyes)');
            $table->string('term_en',32)->comment('term on english (for human eyes)');
            $table->mediumText('specification')->comment('specification on russian (for human eyes)');
            $table->enum('type of transport', ['any', 'water'])->default('any')->comment('to highlight types of incoterms transport');
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
        Schema::dropIfExists('incoterms');
    }
}
