<?php

namespace MindBlown\ProductHealth\Models;

use MindBlown\ProductHealth\Contracts\Model;

class Issue extends Model{

    protected $table = 'ph_issues';

    /**
     * Constant with allowed states
     *
     * @var array
     */
    const IMPORTANCE = [
        'low' => 0,
        'medium' => 10,
        'high' => 20,
        'critical' => 30,
    ];

    /**
     * An issue belongs to a product
     *
     * @return MindBlown\ProductHealth\Models\Product;
     */
    public function product()
    {
        return $this->belongsTo( Product::class );
    }


    /**
     * Return the importance as an int
     *
     * @param string $value
     * @return integer
     */
    public function get_importance( string $value ) : int
    {
        return static::IMPORTANCE[ $value ];
    }


    /**
     * Return weight attribute
     *
     * @return string
     */
    public function getWeightAttribute()
    {
        $importance = array_flip( static::IMPORTANCE );
        return $importance[ $this->importance ];
    }

    /**
     * Fix the message attribute
     *
     * @param string $value
     * @return string
     */
    public function getMessageAttribute( $value ) : string
    {
        return str_replace( '[link]', get_edit_post_link( $this->product_id ), $value );
    }
}
