<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->comment('PK');
            $table->unsignedBigInteger('user_id')->comment('FK');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('crop_id')->comment('FK');
            $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
            $table->string('image',255)->default('1598417043.png')->comment('name of photo');
            $table->unsignedBigInteger('crops_class_id')->comment('FK');
            $table->foreign('crops_class_id')->references('id')->on('crops_classiness')->onDelete('cascade');
            $table->unsignedBigInteger('incoterms_id')->nullable()->comment('FK');
            $table->foreign('incoterms_id')->references('id')->on('incoterms')->onDelete('cascade');
            $table->unsignedBigInteger('location_regions_district_id')->comment('FK');
            $table->foreign('location_regions_district_id')->references('id')->on('location_regions_districts')->onDelete('cascade');
            $table->unsignedBigInteger('pickup_id')->comment('FK');
            $table->float('price', 8, 2)->comment('price');
            $table->enum('unit', ['кг', 'ц', 'т'])->default('т')->comment('unit of crop for pricing');
            $table->foreign('pickup_id')->references('id')->on('pickup')->onDelete('cascade');
            $table->longText('description')->comment('short description of product offer');
            $table->unsignedBigInteger('seller_type_id')->comment('FK');
            $table->foreign('seller_type_id')->references('id')->on('seller_types')->onDelete('cascade');
            $table->string('web-syte',255)->nullable();;
            $table->string('telephon',20);
            $table->unsignedBigInteger('payment_method_id')->nullable()->comment('FK');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->unsignedBigInteger('payment_form_id')->nullable()->comment('FK');
            $table->foreign('payment_form_id')->references('id')->on('payment_forms')->onDelete('cascade');
            $table->unsignedBigInteger('offers_status_id')->default('1')->comment('FK');
            $table->foreign('offers_status_id')->references('id')->on('offers_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('advertisements');
    }
}
