<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('intan_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained('intan_recipes')->onDelete('cascade');
            $table->string('name'); // ← tambahkan langsung di sini
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intan_reviews');
    }
};
