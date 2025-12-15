<?php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    // Relationship: A course belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
}
