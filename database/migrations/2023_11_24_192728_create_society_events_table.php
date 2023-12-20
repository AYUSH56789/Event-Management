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
        Schema::create('society_events', function (Blueprint $table) {
            $table->id("event_id");
            $table->string('society_name', 50)->required();
            $table->string('event_name', 50)->required();
            $table->string('event_mode', 30)->required();
            $table->string('event_vanue')->required();
            $table->string('watsapp_link')->required();
            $table->dateTime('event_datetime')->required();
            $table->string('event_duration')->required();
            $table->dateTime('event_reg_end_datetime')->required();
            $table->string('event_contact', 30)->required();
            $table->string('event_email', 50)->required();
            $table->string('event_banner')->nullable()->default("banner not upload");
            $table->text('event_discription')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('society_events');
    }
};
