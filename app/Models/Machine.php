<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';

    protected $fillable = ['name', 'password', 'date_purchased', 'description', 'user_id', 'machinetype_id'];

    /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Define relationship with machinetype model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machinetype()
    {
        return $this->belongsTo('App\Models\MachineType');
    }

    /* Relacion muchos a muchos */
    // Una maquina puede tener varios estado de reparacion en eventos
    public function statusRepairEvents()
    {
    	return $this->belongsToMany('App\Models\StatusRepair', 'events', 'machine_id', 'statusrepair_id');
    }

    /*
    *   Metodo que muestra el ultimo estado de reparación de la maquina
    */
    public function lastStatusRepair()
    {
        return $this->statusRepairEvents()->orderBy('admission_date','DESC')->first();
    }
}
