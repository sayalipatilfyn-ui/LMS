<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;
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
