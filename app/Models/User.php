<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;



// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'author', 'description'
    ];

    
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
