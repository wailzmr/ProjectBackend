<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['title','description','difficulty','created_by'];


    public function author() { return $this->belongsTo(User::class, 'created_by'); }

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
