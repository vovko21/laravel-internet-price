<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsElectro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_electro', function (Blueprint $table) {
            $table->string('article');
            $table->string('name');
            $table->string('price_dollar');
            $table->string('price_uah');
            $table->integer('quantity')->default(0);
            $table->string('price_discount');
            $table->string('site_url')->nullable();
            $table->string('code_UKTZED');
            $table->integer('min')->nullable();
            $table->integer('packaging')->nullable();
            $table->integer('box')->nullable();
            $table->id();
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
        Schema::dropIfExists('products_electro');
    }
}
