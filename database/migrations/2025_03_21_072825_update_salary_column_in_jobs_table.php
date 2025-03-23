<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('salary')->nullable()->change(); // Change salary to string (VARCHAR)
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('salary')->nullable()->change(); // Revert if needed
        }); 
    }
};

