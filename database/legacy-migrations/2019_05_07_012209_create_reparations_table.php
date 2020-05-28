<?php

use App\Imports\ReparationImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('property')->nullable();
            $table->string('money')->nullable();
            $table->string('training_education')->nullable();
            $table->string('community')->nullable();
            $table->string('funder')->nullable();
        });

        Excel::import(new ReparationImport, 'public/dcj.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparations');
    }
}
