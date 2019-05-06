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

            $table->date('start')->nullable();
            $table->unsignedTinyInteger('start_code')->nullable();
            $table->unsignedTinyInteger('start_precision')->nullable();

            $table->date('end')->nullable();
            $table->unsignedTinyInteger('end_code')->nullable();
            $table->unsignedTinyInteger('end_precision')->nullable();

            $table->unsignedBigInteger('justiceable_id')
                ->nullable();
            $table->string('justiceable_type')
                ->nullable();

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
