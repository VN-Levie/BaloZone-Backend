<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Thêm trường mới
            $table->text('content')->nullable()->after('comment'); // Nội dung bình luận chi tiết
            $table->tinyInteger('rating')->default(5)->after('content'); // Đánh giá từ 1-5 sao
        });

        // Di chuyển dữ liệu từ comment sang content
        DB::table('comments')->update(['content' => DB::raw('`comment`')]);

        // Xóa trường comment cũ
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Thêm lại trường comment cũ
            $table->text('comment')->nullable()->after('user_id');
        });

        // Di chuyển dữ liệu từ content về comment
        DB::table('comments')->update(['comment' => DB::raw('`content`')]);

        // Xóa trường mới
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['content', 'rating']);
        });
    }
};
