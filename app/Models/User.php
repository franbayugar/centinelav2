<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'phone', 'password', 'type', 'area_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Define relationship with area model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * Define relationship with machine model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function machines()
    {
        return $this->hasMany('App\Models\Machine');
    }

    /**
     * Define relationship with events model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * Define relationship with OutputProduct model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outputProducts()
    {
        return $this->hasMany('App\Models\OutputProduct');
    }

    public function isAdmin()
    {
        return $this->type === 'Admin';
    }

    /**
     * Define relationship with area model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workAssignments()
    {
        return $this->belongsTo('App\Models\WorkAssignment');
    }
}
