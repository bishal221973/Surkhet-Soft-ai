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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Company Info
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();

            // Partnership Info
            $table->string('partnership_type')->nullable();
            // reseller, investor, technology, marketing, agency etc.

            $table->string('country')->nullable();
            $table->string('city')->nullable();

            // Proposal
            $table->text('message')->nullable();

            // Status
            $table->enum('status', [
                'pending',
                'reviewing',
                'approved',
                'rejected'
            ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
