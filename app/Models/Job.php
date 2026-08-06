<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    // لأن اسم الجدول في الـ Migration هو job_listings
    protected $table = 'job_listings';



    protected $fillable = [

        'user_id',
        'title',
        'description',
        'company_name',
        'location',
        'salary',
        'image',

    ];



    /**
     * صاحب الوظيفة
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    /**
     * المتقدمون على الوظيفة
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}