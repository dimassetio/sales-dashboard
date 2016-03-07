<?php

namespace App\Entities\Users;

use App\Entities\Users\UserPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable
{
    use SoftDeletes, PresentableTrait, HasRoles;

    protected $dates    = ['deleted_at'];
    protected $fillable = ['name', 'username', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $presenter = UserPresenter::class;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
