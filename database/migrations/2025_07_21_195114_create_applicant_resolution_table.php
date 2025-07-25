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
        Schema::create('applicant_resolution', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('applicant_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('resolution_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['applicant_id', 'resolution_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_resolution');
    }
};
