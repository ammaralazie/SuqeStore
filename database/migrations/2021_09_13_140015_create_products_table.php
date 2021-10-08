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
            $table->bigInteger("catigory_id")->unsigned()->nullable();
            $table->string('PRDName');
            $table->text("PRDDescribtion")->nullable();
            $table->double('PRDPrice',8,2);
            $table->double('PRDDiscount',8,2)->nullable();
            $table->string('image')->default("default.png");
            $table->timestamps();
            $table->foreign('catigory_id')->references('id')->on('catigories')->nullOnDelete();
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
