<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    
    public function getCreatedAtAttribute($value)
    {
        $carbonedDate = Carbon::create($value);
        return $carbonedDate->isoFormat('dddd D MMMM Y');
    }
}
