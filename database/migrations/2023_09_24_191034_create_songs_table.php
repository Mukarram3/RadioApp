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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->integer('artist_id')->nullable();
            $table->integer('channel_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->string('type')->default('');
            $table->string('stream_type')->default('');
            $table->text('stream_url')->nullable();
            $table->boolean('ispodcast')->default(false);
            $table->boolean('istop20')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
