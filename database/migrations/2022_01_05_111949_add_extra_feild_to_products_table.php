<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFeildToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('thumbnail');
            $table->text('description');
            $table->string('brand');
            $table->bigInteger('price');
            $table->bigInteger('discount');
            $table->bigInteger('stock');
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['thumbnail', 'description', 'brand', 'price', 'discount', 'stock', 'color']);
        });
    }
}
