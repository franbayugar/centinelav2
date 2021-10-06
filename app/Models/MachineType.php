<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    protected $table = 'machinetypes';

    protected $fillable = ['name', 'icon'];

    /**
     * Define relationship with Machine model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function machines()
    {
        return $this->hasMany('App\Models\Machine');
    }
}
