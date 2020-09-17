<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title', 'description', 'url', 'image'
    ];

    public function profileImage()
    {
        return '/storage/' . (($this->image) ? $this->image : 'profile/no-image-available.png');
    }

    // We can have a profile that fetches the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A profile can have many users that follow it
    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
