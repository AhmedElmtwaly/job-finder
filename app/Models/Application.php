<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    /**
     * الحقول المسموح بعمل Mass Assignment لها.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'user_id',
        'name',
        'email',
        'phone',
        'cv_path',
        'status',
    ];

    /**
     * الحصول على الوظيفة المرتبط بها طلب التقديم.
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * الحصول على المستخدم الذي قام بالتقديم.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}