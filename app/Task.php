<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //query scope:  'scope' is a keyword, and laravel
    //              knows to treat this method as a query.
    //              Wrapper around a particular query.

    //$query = existing query (for chaining), and any other $val
    public function scopeIncomplete($query) {

        //method wrapper; static references 'Task' model that we're in
        //return static::where('completed', 0)->get();

        return $query->where('completed', 0);
    }
}
