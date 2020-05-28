<?php

use App\Conflict;
use App\Justice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ConvertOldDcjsToDyadic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $justices = Justice::has('conflict')->with('conflict.dyads');

        $justices->each(function ($justice) {
            $conflict = $justice->conflict;

            if ($conflict->has('dyads')) {
                $justice->dyadicConflicts()->sync($conflict->dyads->pluck('id'));
            }
        });
    }
}
