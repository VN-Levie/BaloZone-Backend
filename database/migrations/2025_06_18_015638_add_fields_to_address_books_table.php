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
        Schema::table('address_books', function (Blueprint $table) {
            $table->string('receiver_name')->nullable()->after('address');
            $table->string('receiver_phone')->nullable()->after('receiver_name');
            $table->boolean('is_default')->default(false)->after('receiver_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_books', function (Blueprint $table) {
            $table->dropColumn(['receiver_name', 'receiver_phone', 'is_default']);
        });
    }
};
