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
        Schema::create('is_attendence_activates', function (Blueprint $table) {
            $table->id('is_activate_attendence_id');
            $table->unsignedBigInteger('event_id');
            $table->boolean('is_active')->default(false);

            // Add foreign key constraint
            $table->foreign('event_id')->references('event_id')->on('society_events')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('is_attendence_activates');
    }
};
