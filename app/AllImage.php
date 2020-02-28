<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllImage extends Model
{
    protected $fillable = ['image','title_id'];

     public function ImageGallery(){
        return $this->belongsTo(ImageGallery::class);
    }

}
