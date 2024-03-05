<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->string('pro_name');
            $table->string('pro_prize');
            $table->string('pro_code')->nullable();
            $table->string('pro_color')->nullable();
            $table->string('pro_imag1');
            $table->string('pro_imag2')->nullable();
            $table->string('pro_imag3')->nullable();
            $table->text('pro_desc')->nullable();
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
}
