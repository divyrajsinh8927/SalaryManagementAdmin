<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'tbl_users';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'login_token',
        'last_login',
        'last_login_ip',
        'is_active',
        'is_delete',
        'deleted_by',
        'deleted_by_uid',
        'created_date',
        'updated_date',
    ];
}
