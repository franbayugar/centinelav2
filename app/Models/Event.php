<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['admission_date', 'departure_date', 'statusrepair_id', 'machine_id', 'user_id', 'action_id', 'description'];

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
     * Define relationship with action model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo('App\Models\Action');
    }

    /**
     * Define relationship with statusrepair model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusrepair()
    {
        return $this->belongsTo('App\Models\StatusRepair');
    }

    /**
     * Define relationship with machine model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine()
    {
        return $this->belongsTo('App\Models\Machine');
    }
}
