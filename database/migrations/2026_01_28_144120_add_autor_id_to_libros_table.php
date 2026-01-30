<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->foreignId('autor_id')
                ->after('titulo')
                ->constrained('autores')
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign(['autor_id']);
            $table->dropColumn('autor_id');
        });
    }

};
