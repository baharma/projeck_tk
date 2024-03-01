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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_student_id');
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->unsignedBigInteger('education_id')->nullable();
            $table->text('address')->nullable();
            $table->enum('type' , ['ayah' , 'ibu' , 'wali'])->default('ayah');
            $table->timestamps();

            $table->foreign('registration_student_id')->references('id')->on('registration_students')->onDelete('cascade');
            $table->foreign('education_id')->references('id')->on('education');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
