<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkAssignment extends Model
{
    protected $table = 'work_assignments';

    protected $fillable = ['name', 'start_date', 'finish_date', 'description', 'working_state_id', 'user_id'];

    /**
     * Define relationship with WorkingState model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workingState()
    {
        return $this->belongsTo('App\Models\WorkingState');
    }

    /**
     * Define relationship with User model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
