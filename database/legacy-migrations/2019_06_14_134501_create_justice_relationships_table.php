<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJusticeRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justice_relationships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('justice_a')
                ->references('id')
                ->on('justices')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('justice_b')
                ->references('id')
                ->on('justices')
                ->onDelete('cascade');

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
        Schema::dropIfExists('justice_relationships');
    }
}
