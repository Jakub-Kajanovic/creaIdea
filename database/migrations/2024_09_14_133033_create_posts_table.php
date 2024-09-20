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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('slug')->unique()->after('title');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Nastavíme na null, ak sa kategória vymaže
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Autor odkazuje na používateľa a jeho príspevky sa vymažú, ak sa autor zmaže
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

