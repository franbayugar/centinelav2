<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusOutput extends Model
{
    protected $table = 'statusoutputs';

    protected $fillable = ['name', 'color'];

    /**
     * Define relationship with OutputProduct model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outputProducts()
    {
        return $this->hasMany('App\Models\OutputProduct');
    }
}
