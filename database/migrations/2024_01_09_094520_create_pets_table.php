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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', config('enums.status'));
            $table->string('pawrent');
            $table->enum('breed', config('enums.breed'));
            $table->enum('gender', config('enums.gender'));
            $table->string('contact');
            $table->string('address');
            $table->date('dob');
            $table->enum('city', config('enums.city'));
            $table->enum('township', config('enums.township'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
