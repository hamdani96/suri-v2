<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
    * getAvatarUrlAttribute
    *
    * @return void
    */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar != null) :
            return asset($this->avatar);
        else :
            return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+',
    $this->name) . '&background=4e73df&color=ffffff&size=100';
        endif;
    }

    public function relatedDetailUser()
    {
        return $this->hasOne(DetailUser::class, 'user_id', 'id')->latest();
    }
}
