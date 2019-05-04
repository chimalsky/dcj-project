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
            $table->tinyInteger('start_code');
            $table->tinyInteger('start_precision');

            $table->date('end')->nullable();
            $table->tinyInteger('end_code')->nullable();
            $table->tinyInteger('end_precision')->nullable();

            $table->timestamps();
        });

        Schema::create('model_has_history', function (Blueprint $table) {
            $table->unsignedBigInteger('history_id');

            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_id', 'model_type', ]);

            $table->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onDelete('cascade');

            $table->primary(['history_id', 'model_id', 'model_type'],
                    'model_has_histories_history_model_type_primary');
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
