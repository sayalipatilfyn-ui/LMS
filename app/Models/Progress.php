<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property int $percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Courses $course
 * @method static \Database\Factories\ProgressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereUserId($value)
 * @mixin \Eloquent
 */
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
