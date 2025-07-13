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
    Schema::table('intan_recipes', function (Blueprint $table) {
        $table->dropColumn('steps');
    });
}

public function down()
{
    Schema::table('intan_recipes', function (Blueprint $table) {
        $table->text('steps')->nullable();
    });
}

};
