<?php

use App\Imports\ConflictImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportUcpdArmedConflictDataset181 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = config('ucdp.table_names.conflicts');
        
        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conflict_id');

            $table->string('location');
            $table->unsignedTinyInteger('incompatibility');
            $table->unsignedTinyInteger('type');

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

        Excel::import(new ConflictImport, 'public/ucdp-prio-acd-181.xlsx');

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
