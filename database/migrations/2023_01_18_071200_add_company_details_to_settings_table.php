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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('broadcasting_registration')->after('email')->nullable();
            $table->string('company_registration')->after('email')->nullable();
            $table->string('chairman')->after('email')->nullable();
            $table->string('operator')->after('email')->nullable();
            $table->string('editor')->after('email')->nullable();
            $table->string('news_email')->after('email')->nullable();
            $table->string('ad_email')->after('email')->nullable();
            $table->string('ad_number')->after('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('broadcasting_registration');
            $table->dropColumn('company_registration');
            $table->dropColumn('chairman');
            $table->dropColumn('operator');
            $table->dropColumn('editor');
            $table->dropColumn('news_email');
            $table->dropColumn('ad_email');
            $table->dropColumn('ad_number');
        });
    }
};
