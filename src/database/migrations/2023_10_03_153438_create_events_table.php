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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('detail', 15000);
            $table->text('attendee_info', 15000)->nullable();
            $table->timestamp('event_at');
            $table->string('place', 255);
            $table->double('lat', 8, 6)->nullable();
            $table->double('lng', 9, 6)->nullable();
            $table->integer('capacity')->nullable();
            $table->boolean('is_online')->nullable()->default(false);
            $table->timestamps();
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
