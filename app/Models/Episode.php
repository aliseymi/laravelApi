<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'videoUrl', 'number'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
