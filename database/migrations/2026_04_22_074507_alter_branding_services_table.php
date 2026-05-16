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
        Schema::table('branding_services', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('is_parent')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branding_services', function (Blueprint $table) {
            $table->dropColumn(['parent_id','is_parent']);
        });
    }
};
