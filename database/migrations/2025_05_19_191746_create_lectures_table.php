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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('type')->default('video');
            $table->string('video_url')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
