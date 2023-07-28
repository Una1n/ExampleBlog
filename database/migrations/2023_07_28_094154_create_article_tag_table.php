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
        Schema::create('article_tag', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->primary(['article_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article_tag', function (Blueprint $table) {
            $table->dropForeign('article_id');
            $table->dropForeign('tag_id');
        });

        Schema::dropIfExists('article_tag');
    }
};
