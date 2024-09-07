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
        Schema::create('consultations', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->dateTime('date');
            $table->string('symptoms');

            $table->foreignUlid('doctor_id')->constrained('users');
            $table->foreignUlid('customer_id')->constrained('customers');
            $table->foreignUlid('pet_id')->constrained('pets');
            $table->foreignUlid('receptionist_id')->constrained('users');

            $table->string('diagnostic')->nullable();

            $table->enum('status', ['scheduled', 'canceled', 'done'])->default('scheduled');
            // For example, if the appointment was cancelled, this field can be used to say the reason for cancellation
            $table->string('status_details')->nullable();

            // Any pertinent notes about the consultation
            $table->string('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
