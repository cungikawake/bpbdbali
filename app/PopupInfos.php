<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopupInfos extends Model
{
    protected $table = 'popup_infos';

    protected $fillable = [ 
        'title', 'image', 'url', 'status', 'start', 'finish'
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
