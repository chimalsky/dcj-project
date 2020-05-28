<?php

use App\Imports\TrialImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class CreateTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trials', function (Blueprint $table) {
            $table->increments('id');

            $table->string('domestic')->nullable();
            $table->string('international')->nullable();
            $table->string('venue')->nullable();
            $table->string('absentia')->nullable();
            $table->string('executed')->nullable();
            $table->string('breach')->nullable();
        });

        Excel::import(new TrialImport, 'public/dcj.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trials');
    }
}
