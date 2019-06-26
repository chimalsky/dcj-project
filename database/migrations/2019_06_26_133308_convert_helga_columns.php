<?php

use App\Justice;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertHelgaColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Justice::whereNotNull('gender')
            ->where('gender', 'Men')
            ->update(['gender' => 0]);
        Justice::whereNotNull('gender')
            ->where('gender', 'Women')
            ->update(['gender' => 1]);
        Justice::whereNotNull('gender')
            ->where('gender', 'Women')
            ->update(['gender' => 9]);
        
        Justice::whereNotNull('sexviolence')
            ->where('sexviolence', 'No sexual violence')
            ->update(['sexviolence' => 0]);
        Justice::whereNotNull('sexviolence')
            ->where('sexviolence', 'Sexual violence')
            ->update(['sexviolence' => 1]);
        
        Justice::whereNotNull('wrong')
            ->where('wrong', 'Affiliation')
            ->update(['wrong' => 1]);
        Justice::whereNotNull('wrong')
            ->where('wrong', 'Specific event')
            ->update(['wrong' => 2]);
        Justice::whereNotNull('wrong')
            ->where('wrong', 'The conflict')
            ->update(['wrong' => 3]);
        Justice::whereNotNull('wrong')
            ->where('wrong', 'Other')
            ->update(['wrong' => 4]);
        
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
