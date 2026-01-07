<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progress';

    protected $fillable = [
        'user_id',
        'course_id',
        'percentage'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
