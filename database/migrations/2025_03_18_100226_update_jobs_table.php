<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('experience')->change(); // Change to VARCHAR
            $table->dropColumn('description');      // Drop description column
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('experience')->change();  // Revert back to INTEGER
            $table->text('description');             // Add back the description column
        });
    }
};
