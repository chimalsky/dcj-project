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

            $table->string('dcjid')->nullable();

            $table->boolean('implemented')->nullable();
            
            $table->string('type');
            
            $table->string('target')->nullable();
            $table->boolean('civilian')->nullable();
            $table->boolean('rank_and_file')->nullable();
            $table->boolean('elite')->nullable();

            $table->string('sender')->nullable();
            $table->string('scope')->nullable();
            $table->unsignedInteger('scope_count')->nullable();

            $table->boolean('peace_initiated')->nullable();

            $table->date('start')->nullable();
            $table->string('start_event')->nullable();
            //$table->unsignedTinyInteger('start_code')->nullable();
            $table->string('start_precision')->nullable();


            $table->date('end')->nullable();
            $table->string('end_event')->nullable();
            //$table->unsignedTinyInteger('end_code')->nullable();
            $table->string('end_precision')->nullable();

            $table->string('wrong')->nullable();
            $table->string('gender')->nullable();
            $table->string('sexviolence')->nullable();


            $table->unsignedInteger('conflict_id')
                ->nullable();

            $table->unsignedBigInteger('justiceable_id')
                ->nullable();
            $table->string('justiceable_type')
                ->nullable();

            $table->text('coding_notes')
                ->nullable();
            
            $table->string('related')->nullable()->default(null);

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
