<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * إنشاء جدول الوظائف.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table): void {
            $table->id();

            // الشركة المالكة للوظيفة
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // بيانات الوظيفة
            $table->string('title');
            $table->text('description');
            $table->string('company_name');
            $table->string('location');

            // بيانات اختيارية
            $table->string('salary')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();

            // فهارس لتحسين سرعة البحث
            $table->index('title');
            $table->index('location');
            $table->index('company_name');
        });
    }

    /**
     * حذف جدول الوظائف.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};