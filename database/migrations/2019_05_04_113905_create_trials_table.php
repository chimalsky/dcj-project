<?php


use App\Imports\TrialImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->boolean('domestic')->nullable();
            $table->boolean('international')->nullable();
            $table->string('venue')->nullable();
            $table->boolean('absentia')->nullable();
            $table->boolean('executed')->nullable();
            $table->boolean('breach')->nullable();
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
