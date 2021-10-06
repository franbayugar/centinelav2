<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputProduct extends Model
{
    protected $table = 'inputproducts';

    protected $fillable = ['product_id', 'quantity', 'input_date', 'description'];

    /**
     * Define relationship with product model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
