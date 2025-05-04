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
        Schema::table('boards', function (Blueprint $table) {
            $table->timestamp('timer_started_at')->nullable()->after('title');
            $table->unsignedInteger('timer_duration')->default(5 * 60)->after('timer_started_at');
            $table->unsignedInteger('timer_duration_remaining')->default(5 * 60)->after('timer_duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            $table->dropColumn('timer_started_at');
            $table->dropColumn('timer_duration');
            $table->dropColumn('timer_duration_remaining');
        });
    }
};
