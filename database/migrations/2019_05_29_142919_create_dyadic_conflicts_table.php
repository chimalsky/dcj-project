<?php

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DyadicIntegrationTwo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDyadicConflictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('dyadic_conflicts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('dyad_id')
                ->nullable();
                
            $table->unsignedInteger('conflictyear_id')
                ->references('id')
                ->on('conflicts')
                ->onDelete('cascade');

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

            $table->date('start_date');
            $table->unsignedTinyInteger('start_precision');
            $table->date('start_2_date');
            $table->unsignedTinyInteger('start_2_precision');

            $table->boolean('episode_ended');
            $table->date('episode_end_date')->nullable();
            $table->unsignedTinyInteger('episode_end_precision')
                ->nullable();

            $table->string('gwno_a');
            $table->string('gwno_a_2nd')->nullable();

            $table->string('gwno_b')->nullable();
            $table->string('gwno_b_2nd')->nullable();
            $table->string('gwno_location')->nullable();

            $table->string('region');

            $table->timestamps();
        });

        Excel::import(new DyadicIntegrationTwo, 'public/ucdp-dyadic-181.xlsx');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dyadic_conflicts');
    }
}
