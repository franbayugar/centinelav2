<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = ['name'];

    /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mails()
    {
        return $this->hasMany('App\Models\Mail');
    }

    /**
     * Define relationship with router model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function routers()
    {
        return $this->hasMany('App\Models\Router');
    }

    /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function viatics()
    {
        return $this->hasMany('App\Models\Viatic');
    }

}
