<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('job_type', ['Full-time', 'Part-time', 'Internship']);
            $table->enum('work_mode', ['On-site', 'Remote', 'Hybrid']);
            $table->string('required_skills');
            $table->date('last_date_to_apply');
            $table->string('hr_contact_name');
            $table->string('hr_email')->unique();
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn([
                'job_type',
                'work_mode',
                'required_skills',
                'last_date_to_apply',
                'hr_contact_name',
                'hr_email'
            ]);
        });
    }
};
