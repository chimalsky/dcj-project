<?php

use App\Imports\TruthImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class CreateTruthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truths', function (Blueprint $table) {
            $table->increments('id');

            $table->string('report')->nullable();
            $table->string('breach')->nullable();
            $table->string('international')->nullable();
        });

        Excel::import(new TruthImport, 'public/dcj.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truths');
    }
}
