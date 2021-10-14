<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $table = 'users_work_assignments';
 

    /**
     * Define relationship with area model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workAssignments()
    {
        return $this->belongsTo('App\Models\WorkAssignment');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
