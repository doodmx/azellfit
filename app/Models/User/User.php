<?php

namespace App\Models\User;

use App\Models\Course\Course;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Partner\PartnerResource;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, SoftDeletes;

    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'partner_id', 'name', 'email', 'password', 'status', 'notes', 'locale', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * @param $query
     * @param $role
     * @return mixed
     */
    public function scopeFilterByRole($query, $role)
    {
        return $query->whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taughtCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrolls()
    {
        return $this->hasMany(PartnerResource::class, 'partner_id', 'id');
    }

    public function owner()
    {
        return $this->hasOne(Profile::class, 'user_id', 'partner_id');

    }
}
