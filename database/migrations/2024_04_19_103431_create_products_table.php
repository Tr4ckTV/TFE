<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->integer('quantity')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->boolean('is_promotion')->default(false);
            $table->decimal('discount_percentage', 5, 2)->nullable(); // 5 chiffres au total, dont 2 après la virgule
            $table->decimal('discounted_price', 8, 2)->nullable(); // 8 chiffres au total, dont 2 après la virgule
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

