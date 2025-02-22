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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('book_id');
            $table -> text('review');
            $table->unsignedTinyInteger('rating');
            $table->timestamps();

            // The code defines a foreign key relationship between the book_id column in the current table and the id column in the books table. 
            // It ensures that if a record in the books table is deleted, any related records in the current table that reference the deleted book_id will also be automatically deleted (cascade delete).

            // $table->foreign('book_id')-> references('id')->on('books')
            //     ->onDelete('cascade');

            $table -> foreignId('book_id')->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
