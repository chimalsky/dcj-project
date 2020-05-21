<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertJsonToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('codings', function (Blueprint $table) {
            $table->text('codes')->change();
        });
        Schema::table('forms', function (Blueprint $table) {
            $table->text('schema')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codings', function (Blueprint $table) {
            $table->json('codes')->change();
        });
        Schema::table('forms', function (Blueprint $table) {
            $table->json('schema')->nullable()->change();
        });
    }
}
