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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('groom_name');
            $table->string('groom_parent')->nullable();
            $table->string('groom_photo')->nullable();
            $table->string('bride_name');
            $table->string('bride_parent')->nullable();
            $table->string('bride_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->text('quote_text')->nullable();
            $table->string('quote_source')->nullable();
            $table->string('music_url')->nullable();
            $table->string('theme')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
