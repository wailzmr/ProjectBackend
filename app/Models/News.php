<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','image_path','content','published_at','created_by'];

    protected $casts = ['published_at' => 'datetime'];

    public function author() { return $this->belongsTo(User::class, 'created_by'); }
}
