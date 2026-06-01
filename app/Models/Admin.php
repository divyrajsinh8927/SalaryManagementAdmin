<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tbl_admin';
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
        'reset_password_token',
        'reset_password_token_expiry',
    ];

}
