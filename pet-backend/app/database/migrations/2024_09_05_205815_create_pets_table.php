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
            $table->ulid('id')->primary();
            $table->string('name');
            $table->tinyInteger('birth_month');
            $table->year('birth_year');

            $table->foreignUlid('animal_type_id')->constrained('animal_types');
            $table->foreignUlid('customer_id')->constrained('customers');

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
