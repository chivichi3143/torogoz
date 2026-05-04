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
        Schema::table('event_reviews', function (Blueprint $table) {
            $table->string('email')->nullable()->after('author_name');
            $table->boolean('accepted_terms')->default(false)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_reviews', function (Blueprint $table) {
            $table->dropColumn(['email', 'accepted_terms']);
        });
    }
};
