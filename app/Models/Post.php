<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        $carbonedDate = Carbon::create($value);
        return $carbonedDate->isoFormat('dddd D MMMM Y');
    }
}
