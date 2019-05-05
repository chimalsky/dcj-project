<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('start');
            $table->tinyInteger('start_code')->nullable();
            $table->tinyInteger('start_precision')->nullable();

            $table->date('end')->nullable();
            $table->tinyInteger('end_code')->nullable();
            $table->tinyInteger('end_precision')->nullable();

            $table->unsignedBigInteger('historyable_id');
            $table->string('historyable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
