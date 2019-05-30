<?php

use App\Justice;
use App\Conflict;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        $justices->each(function($justice) {
            $conflict = $justice->conflict;

            if ($conflict->has('dyads')) {
                $dyadicConflict = $conflict->dyads[0];
                $dyadicConflict->justices()->save($justice);
                $dyadicConflict->save();
            }
        });
    }

}
