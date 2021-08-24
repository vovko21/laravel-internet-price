<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsElectro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_electro', function (Blueprint $table) {
            $table->tinyInteger('new')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('hit')->default(0);
            $table->tinyInteger('recommended')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_electro', function (Blueprint $table) {
            $table->dropColumn('new');
            $table->dropColumn('sale');
            $table->dropColumn('hit');
            $table->dropColumn('recommended');
        });
    }
}
