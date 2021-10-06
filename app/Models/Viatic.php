<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viatic extends Model
{
    protected $table = 'viatics';

    protected $fillable = ['work_date', 'description', 'area_id'];

    /**
     * Define relationship with area model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
