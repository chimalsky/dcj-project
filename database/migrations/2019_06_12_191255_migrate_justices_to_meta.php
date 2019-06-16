<?php

use App\Justice;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateJusticesToMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $justices = Justice::with('justiceable')

        $justices->each(function($justice) {
            $process = $justice->justiceable;

            $attributes = $process->makeHidden('id')->toArray();

            $justice->setMeta($attributes);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
