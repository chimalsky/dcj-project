<?php

use App\Justice;
use App\JusticeRelationship;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateRelatedJustices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $justices = Justice::whereNotNull('related');

        $justices->get()->each(function($justice) {
            $related = Justice::where('dcjid', $justice->related)->first();

            if (!$related) {
                return;
            }

            JusticeRelationship::create([
                'justice_a' => $justice->id,
                'justice_b' => $related->id
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
