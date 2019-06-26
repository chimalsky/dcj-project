<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFormItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_form_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('form_id')
                ->references('id')
                ->on('forms')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('form_item_id')
                ->references('id')
                ->on('form_items')
                ->onDelete('cascade');  

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
        Schema::dropIfExists('form_form_item');
    }
}
