<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('user_name', 50)->required();
            $table->string('user_branch', 30)->required();
            $table->string('user_urn', 30)->required();
            $table->string('user_crn', 30)->required();
            $table->string('user_year', 50)->required();
            $table->string('user_pass', 50)->required();
            $table->string('user_email', 50)->required();
            $table->string('user_contact', 50)->required();
            $table->string('user_photo')->nullable()->default("logo not upload");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
