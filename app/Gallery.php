<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [ 
        'title', 'image', 'status'
    ];

    public function displayStatus()
    {
        if($this->status){
            return 'Active';
        }else{
            return 'NonActive';
        }
    }
}
