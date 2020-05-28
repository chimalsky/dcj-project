<?php

use App\Imports\PurgeImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class CreatePurgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('permanent')->nullable();
            $table->string('military')->nullable();
            $table->string('judiciary')->nullable();
            $table->string('civil_service')->nullable();
        });

        Excel::import(new PurgeImport, 'public/dcj.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purges');
    }
}
