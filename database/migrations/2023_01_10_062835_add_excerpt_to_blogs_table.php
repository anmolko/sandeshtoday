<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('excerpt')->after('slug')->nullable();
            $table->text('numeric_slug')->after('slug')->nullable();
            $table->string('featured_from')->after('image')->nullable();
            $table->string('featured_to')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('excerpt');
            $table->dropColumn('numeric_slug');
            $table->dropColumn('featured_from');
            $table->dropColumn('featured_to');
        });
    }
};
