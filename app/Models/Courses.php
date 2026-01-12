<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $category
 * @property numeric|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Progress> $progress
 * @property-read int|null $progress_count
 * @method static \Database\Factories\CoursesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Courses whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Courses extends Model
{
    use HasFactory;
    protected $fillable=['title','description','category','price'];

    public function progress()
{
    return $this->hasMany(Progress::class);
}
}
