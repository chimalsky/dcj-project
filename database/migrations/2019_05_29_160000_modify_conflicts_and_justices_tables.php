<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyConflictsAndJusticesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::table('justices', function(Blueprint $table) {
            $table->unsignedInteger('dyadic_conflict_id')
                ->nullable()
                ->references('id')
                ->on('dyadic_conflicts')
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
        //
    }
}
