<?php

namespace App;

class Stripe
{
    protected $key;
    
    public function __construct($apikey)
    {
        $this->key = $apikey;
    }

}