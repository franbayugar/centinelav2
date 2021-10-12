<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        'id',
        'emitter_name',
        'date',
        'call_description',
        'area_id',
        'notified',
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
