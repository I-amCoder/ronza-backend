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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('top_banner_1')->default('default_banner.jpg');
            $table->string('top_banner_2')->default('default_banner.jpg');
            $table->string('middle_banner_1')->default('default_banner.jpg');
            $table->string('middle_banner_2')->default('default_banner.jpg');
            $table->string('middle_banner_3')->default('default_banner.jpg');
            $table->string('bottom_banner_1')->default('default_banner.jpg');
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
        Schema::dropIfExists('banners');
    }
};
