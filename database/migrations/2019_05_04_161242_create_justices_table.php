<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJusticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('implemented')->nullable();
            $table->tinyInteger('target')->nullable();
            $table->boolean('civilian')->nullable();
            $table->boolean('rank_and_file')->nullable();
            $table->boolean('elite')->nullable();

            $table->tinyInteger('sender')->nullable();
            $table->tinyInteger('scope')->nullable();
            $table->unsignedInteger('scope_count')->nullable();

            $table->boolean('peace_initiated')->nullable();

            $table->date('start');
            $table->tinyInteger('start_code')->nullable();
            $table->tinyInteger('start_precision')->nullable();

            $table->date('end')->nullable();
            $table->tinyInteger('end_code')->nullable();
            $table->tinyInteger('end_precision')->nullable();

            $table->unsignedBigInteger('justiceable_id');
            $table->string('justiceable_type');

            $table->text('coding_notes')
                ->nullable();

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
        Schema::dropIfExists('justices');
    }
}
