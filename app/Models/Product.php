<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'stock', 'image', 'description'];

    /**
     * Define relationship with InputProduct model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inputProducts()
    {
        return $this->hasMany('App\Models\InputProduct');
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

    /*
    *   Busca productos
    */
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'Like', "%$name%");
    }
}
