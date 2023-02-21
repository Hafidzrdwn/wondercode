<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        if (strpos($this->avatar, 'http') === 0 || strpos($this->avatar, 'https') === 0) {
            return $this->avatar;
        } else {
            return asset('storage/' . $this->avatar);
        }
    }

    public function cover()
    {
        // return asset('storage/' . $this->cover);
        return $this->cover;
    }
}
