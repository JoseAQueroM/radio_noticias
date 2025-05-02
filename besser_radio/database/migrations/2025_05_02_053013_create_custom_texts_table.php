<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('custom_texts', function (Blueprint $table) {
            $table->id();
            $table->string('title_logo')->nullable();
            $table->string('title_home')->nullable();
            $table->text('subtitle_home')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('custom_texts');
    }
    
};
