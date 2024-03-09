<?php

namespace Wooves\ProductHealth\Controllers;

use Illuminate\Support\Collection;
use Wooves\ProductHealth\Contracts\Controller;

class ProductController extends Controller{

    /**
     * Warnings and improvements collections
     *
     * @var Collection
     */
    protected $warnings;
    protected $improvements;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warnings = \collect([]);
        $this->improvements = \collect([]);
    }


    /**
     * Returns warnings
     *
     * @return Collection
     */
    public function get_warnings() : Collection
    {
        return $this->warnings;
    }


    /**
     * Returns improvements
     *
     * @return Collection
     */
    public function get_improvements() : Collection
    {
        return $this->improvements;
    }

}
