<?php

use App\Imports\ExileImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exiles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('permanent')->nullable();
        });

        Excel::import(new ExileImport, 'public/dcj.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exiles');
    }
}
