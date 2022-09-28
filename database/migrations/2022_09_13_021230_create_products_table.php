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
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->text('description');
            $table->longText('content');
            $table->integer('menu_id')->nullable();
            $table->string('thumb');
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
            $table->integer('active');
            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade');
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
