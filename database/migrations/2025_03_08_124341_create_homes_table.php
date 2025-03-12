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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->json('meta_title');
            $table->json('meta_description');
            $table->text('og_image');
            $table->json('keywords');
            $table->text('scripts_head_top')->nullable();
            $table->text('scripts_head_bottom')->nullable();
            $table->text('scripts_body_top')->nullable();
            $table->json('name');
            $table->text('logo');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->string('nip')->nullable();
            $table->text('google_map')->nullable();
            $table->text('google_link')->nullable();
            $table->json('hero_heading')->nullable();
            $table->json('hero_text')->nullable();
            $table->text('hero_image')->nullable();
            $table->text('hero_background')->nullable();
            $table->json('offer_subheading')->nullable();
            $table->json('offer_heading')->nullable();
            $table->json('offer_text')->nullable();
            $table->json('about_subheading')->nullable();
            $table->json('about_heading')->nullable();
            $table->json('about_text')->nullable();
            $table->text('about_image')->nullable();
            $table->text('about_background')->nullable();
            $table->json('realisations_subheading')->nullable();
            $table->json('realisations_heading')->nullable();
            $table->json('realisations_text')->nullable();
            $table->text('realisations_image')->nullable();
            $table->text('realisations_background')->nullable();
            $table->json('cooperation_subheading')->nullable();
            $table->json('cooperation_heading')->nullable();
            $table->json('cooperation_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
