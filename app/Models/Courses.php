<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;
    protected $fillable=['title','description','category','price'];

    public function progress()
{
    return $this->hasMany(Progress::class);
}
}
