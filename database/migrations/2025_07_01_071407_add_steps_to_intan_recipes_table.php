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
    Schema::table('intan_recipes', function (Blueprint $table) {
        $table->longText('steps')->nullable()->after('description');
    });
}

public function down(): void
{
    Schema::table('intan_recipes', function (Blueprint $table) {
        $table->dropColumn('steps');
    });
}

};
