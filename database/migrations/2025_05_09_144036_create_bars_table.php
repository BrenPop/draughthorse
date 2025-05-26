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
        Schema::create('bars', function (Blueprint $table) {
            $table->id();
            $table->string('bar_name');
            $table->longText('description');
            $table->string('profile_image');
            $table->string('cover_image');
            $table->string('address_line_one');
            $table->string('address_line_two');
            $table->string('address_line_three');
            $table->string('postal_code');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('bar_type_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bars');
    }
};
