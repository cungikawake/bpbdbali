<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $fillable = ['title'];

    public function AllImage(){
        return $this->belongsTo('App\AllImage');
    }

	public function CountImage()
	{
	    return $this->hasMany('App\AllImage', 'title_id');
	}    

}
