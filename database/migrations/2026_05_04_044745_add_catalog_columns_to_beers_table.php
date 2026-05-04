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
        Schema::table('beers', function (Blueprint $table) {
            $table->string('slug')->unique()->after('id');
            $table->string('name');
            $table->string('style');
            $table->string('color', 32);
            $table->string('accent', 32);
            $table->string('abv', 16);
            $table->string('ibus', 16);
            $table->unsignedTinyInteger('amargor')->default(1);
            $table->unsignedTinyInteger('cuerpo')->default(1);
            $table->unsignedTinyInteger('aroma')->default(1);
            $table->text('description');
            $table->text('pairing');
            $table->string('image_bottle');
            $table->string('image_background');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beers', function (Blueprint $table) {
            $table->dropColumn([
                'slug', 'name', 'style', 'color', 'accent', 'abv', 'ibus',
                'amargor', 'cuerpo', 'aroma', 'description', 'pairing',
                'image_bottle', 'image_background', 'sort_order', 'is_active',
            ]);
        });
    }
};
