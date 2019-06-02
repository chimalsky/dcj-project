<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDyadicConflictJusticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dyadic_conflict_justice', function (Blueprint $table) {            
            $table->unsignedInteger('dyadic_conflict_id')
                ->references('id')
                ->on('dyadic_conflicts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('justice_id')
                ->references('id')
                ->on('justices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->primary(['dyadic_conflict_id', 'justice_id']);	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dyadic_conflict_justice');
    }
}
