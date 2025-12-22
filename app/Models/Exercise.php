<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'notes'];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class)
            ->withPivot('sets', 'reps', 'seconds');
    }
}
