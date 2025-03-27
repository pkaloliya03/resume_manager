<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->timestamp('applied_on')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('applied_on');
        });
    }
};
