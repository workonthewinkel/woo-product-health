<?php

namespace MindBlown\ProductHealth\Models;

use MindBlown\ProductHealth\Contracts\Model;
use MindBlown\ProductHealth\Models\Scopes\ProductScope;

class Product extends Model{

    /**
     * products use the posts table
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Only the id and order_id are guarded
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * When creating a product, always take the scope with you
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();
        static::addGlobalScope( new ProductScope() );
    }

    /**
     * A product has many issues
     *
     * @return MindBlown\ProductHealth\Models\Issue
     */
    public function issues()
    {
        return $this->hasMany( Issue::class );
    }
}
