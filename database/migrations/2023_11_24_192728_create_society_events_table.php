<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('society_events', function (Blueprint $table) {
            $table->bigIncrements("event_id"); // Set event_id as primary key
            $table->unsignedBigInteger('society_id');
            // Add foreign key constraint for society_id
            $table->foreign('society_id')->references('society_id')->on('societies')->onDelete('cascade');
            
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
        DB::statement('ALTER TABLE society_events AUTO_INCREMENT = 1000000');

        // Use a trigger to set the event_id based on society_id and a random number
        DB::statement('
            CREATE TRIGGER set_event_id
            BEFORE INSERT ON society_events
            FOR EACH ROW
            SET NEW.event_id = CONCAT(NEW.society_id, FLOOR(RAND() * 1000000))
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('society_events');
    }
};
