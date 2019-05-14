<?php

use App\Justice;
use App\Imports\JusticeRelations;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedJusticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_justices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('justice_a_id')
                ->references('id')
                ->on('justices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('justice_b_id')
                ->references('id')
                ->on('justices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });

        $justices = Justice::whereNotNull('related');

        $justices->each(function($justice) {
            $related = Justice::where('dcjid', $justice->dcjid)->first();

            $justice->relatedJustices()->sync([$related->id]);
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_justices');
    }
}
