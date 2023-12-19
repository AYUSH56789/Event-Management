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
        Schema::create('societies', function (Blueprint $table) {
            $table->id('society_id');
            $table->string('society_name', 50)->required();
            $table->string('society_head', 30)->required();
            $table->string('society_conviner', 30)->required();
            $table->string('society_contact', 30)->required();
            $table->string('society_email', 50)->required();
            $table->string('society_pass', 50)->required();
            $table->string('society_logo')->nullable()->default("logo not upload");
            $table->string('society_banner')->nullable()->default("banner not upload");
            $table->string('society_description')->required();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};
