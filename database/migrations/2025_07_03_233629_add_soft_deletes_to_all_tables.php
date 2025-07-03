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
        // Add soft deletes to users table
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to brands table
        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to categories table
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to products table
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to comments table
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to orders table
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to order_details table
        Schema::table('order_details', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to vouchers table
        Schema::table('vouchers', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to news table
        Schema::table('news', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to contacts table
        Schema::table('contacts', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to address_books table
        Schema::table('address_books', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to sale_campaigns table
        Schema::table('sale_campaigns', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to sale_products table
        Schema::table('sale_products', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to payment_methods table
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to roles table
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove soft deletes from all tables
        $tables = [
            'users',
            'brands',
            'categories',
            'products',
            'comments',
            'orders',
            'order_details',
            'vouchers',
            'news',
            'contacts',
            'address_books',
            'sale_campaigns',
            'sale_products',
            'payment_methods',
            'roles'
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
};
