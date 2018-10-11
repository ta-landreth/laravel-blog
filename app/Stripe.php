<?php

namespace App;

class Stripe
{
    protected $key;
    
    public function __construct($key)
    {
        $this->key = $key;
    }

}