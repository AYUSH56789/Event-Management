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
        Schema::create('user__event__regs', function (Blueprint $table) {
            $table->id("event_reg_id");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            // Add any other columns you need for user event registrations
            // $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('students')->onDelete('cascade');
            $table->foreign('event_id')->references('event_id')->on('society_events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__event__regs');
    }
};
