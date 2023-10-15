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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('model')->nullable();
            $table->string('slug');
            $table->string('sku')->nullable();
            $table->string('image');
            $table->longText('description')->nullable();
            $table->double('base_price', 8, 2)->default(0);
            $table->float('discount')->nullable();
            $table->string('discount_type')->default('percentage');
            $table->unsignedTinyInteger('show_in_frontend')->default(1);
            $table->unsignedInteger('qty')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_special')->default(0);

            $table->string('meta_title', 191)->nullable();
            $table->string('meta_description', 191)->nullable();
            $table->text('meta_keywords')->nullable();
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
