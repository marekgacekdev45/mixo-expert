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
        Schema::create('privacy_policy_pages', function (Blueprint $table) {
            $table->id();
            $table->json('meta_title');
            $table->json('meta_description');
            $table->text('hero_image');
            $table->json('hero_heading');
            $table->json('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_policy_pages');
    }
};
