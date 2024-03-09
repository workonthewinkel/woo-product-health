<?php

namespace MindBlown\ProductHealth\Models;

use MindBlown\ProductHealth\Contracts\Model;

class Issue extends Model{

    protected $table = 'ph_issues';

    /**
     * An issue belongs to a product
     *
     * @return MindBlown\ProductHealth\Models\Product;
     */
    public function product()
    {
        return $this->belongsTo( Product::class );
    }
}
