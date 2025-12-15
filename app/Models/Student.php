<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'roll_number',
        'program',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}