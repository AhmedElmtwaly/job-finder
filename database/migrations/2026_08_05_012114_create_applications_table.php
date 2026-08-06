<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * إنشاء جدول طلبات التقديم.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table): void {

            $table->id();


            // المستخدم صاحب طلب التقديم
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();


            // الوظيفة التي تم التقديم عليها
            $table->foreignId('job_id')
                ->constrained('job_listings')
                ->cascadeOnDelete();


            // بيانات المتقدم
            $table->string('name');

            $table->string('email');

            $table->string('phone', 20);



            // ملف الـ CV
            $table->string('cv_path');



            // حالة الطلب
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected'
            ])
            ->default('pending');



            $table->timestamps();



            // تحسين البحث والأداء
            $table->index('user_id');

            $table->index('job_id');

            $table->index('status');

            $table->index('email');


        });
    }



    /**
     * حذف جدول الطلبات.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};