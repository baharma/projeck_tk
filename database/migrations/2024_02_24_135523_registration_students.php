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
        Schema::create('registration_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['laki_laki', 'perempuan']);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->unsignedBigInteger('religion_id');
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('number_of_siblings')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('kk_image')->nullable();
            $table->string('akta_image')->nullable();
            $table->enum('status', ['pending', 'valid'])->default('pending');
            $table->timestamps();

            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_students');
    }
};
