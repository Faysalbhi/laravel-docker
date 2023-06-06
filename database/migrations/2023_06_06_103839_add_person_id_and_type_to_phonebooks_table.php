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
        Schema::table('phonebooks', function (Blueprint $table) {
            $table->unsignedBiginteger('person_id')->after('phone');
            $table->unsignedBiginteger('type')->after('person_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phonebooks', function (Blueprint $table) {
            $table->dropColumn('person_id');
            $table->dropColumn('type');
        });
    }
};
