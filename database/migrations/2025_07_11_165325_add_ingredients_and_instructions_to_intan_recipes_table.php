<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIngredientsAndInstructionsToIntanRecipesTable extends Migration
{
    public function up()
    {
        Schema::table('intan_recipes', function (Blueprint $table) {
            $table->text('ingredients')->nullable()->after('description');
            $table->text('instructions')->nullable()->after('ingredients');
        });
    }

    public function down()
    {
        Schema::table('intan_recipes', function (Blueprint $table) {
            $table->dropColumn(['ingredients', 'instructions']);
        });
    }
}
