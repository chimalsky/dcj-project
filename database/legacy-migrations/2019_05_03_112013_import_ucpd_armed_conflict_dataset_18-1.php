<?php

use App\Conflict;
use App\ConflictSeries;
use App\Imports\ConflictImport;
use App\Imports\DyadicIntegration;
use App\Imports\DyadImport;
use App\Imports\TranslateConflictImport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class ImportUcpdArmedConflictDataset181 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conflict_series', function (Blueprint $table) {
            $table->unsignedInteger('id');
        });

        $tableName = config('ucdp.table_names.conflicts');

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('dyad_id')
                ->nullable();

            $table->unsignedInteger('conflict_id')
                ->references('id')
                ->on('conflict_series')
                ->onDelete('cascade');

            $table->unsignedInteger('old_conflict_id')->nullable();

            $table->unsignedTinyInteger('type')->nullable();

            $table->string('location');
            $table->unsignedTinyInteger('incompatibility');

            $table->string('side_a');
            $table->string('side_a_id')->nullable();
            $table->string('side_b');
            $table->string('side_b_id')->nullable();

            $table->string('territory')->nullable();
            $table->unsignedSmallInteger('year');

            $table->unsignedTinyInteger('intensity');
            $table->unsignedTinyInteger('cumulative_intensity');

            $table->date('start_date');
            $table->unsignedTinyInteger('start_precision');
            $table->date('start_2_date');
            $table->unsignedTinyInteger('start_2_precision');

            $table->boolean('episode_ended');
            $table->date('episode_end_date')->nullable();
            $table->unsignedTinyInteger('episode_end_precision')
                ->nullable();

            $table->string('gwno_a');
            $table->string('gwno_b')->nullable();
            $table->string('gwno_location')->nullable();

            $table->string('region');

            $table->timestamps();
        });

        Schema::create('ucdp_dyads', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('old_id');
            $table->string('name');
        });

        Schema::create('translate_conflicts', function (Blueprint $table) {
            $table->integer('new_id');
            $table->string('old_id');
        });

        Excel::import(new TranslateConflictImport, 'public/translate_conf.xlsx');
        Excel::import(new ConflictImport, 'public/ucdp-prio-acd-181.xlsx');
        Excel::import(new DyadImport, 'public/translate_dyad.xlsx');

        $conflicts = Conflict::all();
        $conflicts->each(function ($episode) {
            ConflictSeries::firstOrCreate([
                'id' => $episode->conflict_id,
            ]);
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
