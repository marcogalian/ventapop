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
        Schema::table('ad_user', function (Blueprint $table) {
            $table->boolean('is_favorite')->after('user_id')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_user', function (Blueprint $table) {
            $table->dropColumn('is_favorite');
        });
    }
};
