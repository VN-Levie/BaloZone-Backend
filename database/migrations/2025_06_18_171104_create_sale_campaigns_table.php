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
        Schema::create('sale_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên chiến dịch: "Black Friday 2024"
            $table->string('slug')->unique(); // URL-friendly name
            $table->text('description')->nullable(); // Mô tả chiến dịch
            $table->string('banner_image')->nullable(); // Hình ảnh banner
            $table->datetime('start_date'); // Ngày bắt đầu sale
            $table->datetime('end_date'); // Ngày kết thúc sale
            $table->enum('status', ['draft', 'active', 'expired', 'cancelled'])->default('draft');
            $table->boolean('is_featured')->default(false); // Chiến dịch nổi bật
            $table->integer('priority')->default(0); // Độ ưu tiên hiển thị
            $table->json('metadata')->nullable(); // Dữ liệu bổ sung (colors, tags, etc.)
            $table->timestamps();

            // Indexes
            $table->index(['status', 'start_date', 'end_date']);
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_campaigns');
    }
};
