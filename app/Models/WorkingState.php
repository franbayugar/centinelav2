<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingState extends Model
{
    protected $table = 'working_states';

    protected $fillable = ['name', 'color'];

}
