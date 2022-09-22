<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Hobby extends Model
{
    use HasFactory;

        /**
     * The hobbies that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
