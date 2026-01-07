<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable=['title','description','category','price'];

    public function progress()
{
    return $this->hasMany(Progress::class);
}
}
