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
            // Rename name to recipient_name and phone to recipient_phone to match API docs
            $table->renameColumn('name', 'recipient_name');
            $table->renameColumn('phone', 'recipient_phone');

            // Add postal_code field back
            $table->string('postal_code')->nullable()->after('province');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_books', function (Blueprint $table) {
            // Reverse the changes
            $table->renameColumn('recipient_name', 'name');
            $table->renameColumn('recipient_phone', 'phone');
            $table->dropColumn('postal_code');
        });
    }
};
