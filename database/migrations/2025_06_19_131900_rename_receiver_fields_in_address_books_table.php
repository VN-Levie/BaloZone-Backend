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
            $table->renameColumn('receiver_name', 'name');
            $table->renameColumn('receiver_phone', 'phone');
            $table->dropColumn('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_books', function (Blueprint $table) {
            $table->renameColumn('name', 'receiver_name');
            $table->renameColumn('phone', 'receiver_phone');
            $table->string('postal_code')->nullable();
        });
    }
};
