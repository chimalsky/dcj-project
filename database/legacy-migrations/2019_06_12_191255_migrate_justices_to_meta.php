<?php

use App\Justice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrateJusticesToMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $justices = Justice::with('justiceable');

        $justices->each(function ($justice) {
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
