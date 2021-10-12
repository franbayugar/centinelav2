<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        'id',
        'emitter_name',
        'date',
        'call_description',
        'emitter_area',
        'notified',
    ];

    /**
     * Define relationship with InputProduct model
     *
     *
     * /
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function inputCalls()
    //   {
    //      return $this->hasMany('App\Models\InputProduct');
    //}

    /**
     * Define relationship with OutputProduct model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //public function outputProducts()
    //{
    //    return $this->hasMany('App\Models\OutputProduct');
    //}

    /*
     *   Busca productos
     */
    //public function scopeSearch($query, $name)
    //{
    //    return $query->where('name', 'Like', "%$name%");
    //}
}