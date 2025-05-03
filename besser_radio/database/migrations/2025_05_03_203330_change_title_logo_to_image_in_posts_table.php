<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Elimina el campo antiguo si existe
            $table->dropColumn('title_logo');
            
            // Añade el nuevo campo para la imagen
            $table->string('title_logo')->nullable()->default(null);
            // O si quieres guardar rutas más largas:
            // $table->text('title_logo')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title_logo');
            $table->string('title_logo')->nullable();
        });
    }
};