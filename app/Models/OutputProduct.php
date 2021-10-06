<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutputProduct extends Model
{
    protected $table = 'outputproducts';

    protected $fillable = ['product_id', 'quantity', 'output_date', 'description', 'user_id', 'statusoutput_id'];

    /**
     * Define relationship with product model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

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
     * Define relationship with statusoutput model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusoutput()
    {
        return $this->belongsTo('App\Models\StatusOutput');
    }
}
