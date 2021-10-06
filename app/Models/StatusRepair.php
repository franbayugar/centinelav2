<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusRepair extends Model
{
    protected $table = 'statusrepairs';

    protected $fillable = ['name', 'color'];

    /* Relacion muchos a muchos
    // Una maquina puede tener varios eventos
    public function events()
    {
    	return $this->belongsToMany('App\Models\Machine', 'events', 'machine_id', 'statusrepair_id');
    }*/

    // Relacion muchos a muchos
    // Un estado de reparación puede estar en muchas maquinas
    public function machines()
   	{
   		return $this->belongsToMany('App\Models\StatusRepair')->withTimestamps();
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
}
