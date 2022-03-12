<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsToEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('capa', 'cover');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('id_autor', 'author_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('publicado', 'published');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('visualizacoes', 'views');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('cover', 'capa');
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('author_id', 'id_autor');
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('published', 'publicado');
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('views', 'visualizacoes');
        });
    }
}
