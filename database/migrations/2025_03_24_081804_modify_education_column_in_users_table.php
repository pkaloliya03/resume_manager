<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('education', ['10th', 'Diploma/12th', 'Graduation', 'Post-Graduation'])->nullable()->change();
        });        
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('education')->change(); // Revert back if needed
        });
    }
};
