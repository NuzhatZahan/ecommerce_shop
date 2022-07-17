<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->foreignId("category_id");
            $table->foreignId("brand_id");
            $table->string("product_name",40);
            $table->text("product_short_description");
            $table->longText("product_long_description");
            $table->string("product_size");
            $table->float("product_price");
            $table->string("product_color");
            $table->string("product_image");
            $table->string("publication_status")->default(0);
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
        Schema::dropIfExists('products');
    }
};
