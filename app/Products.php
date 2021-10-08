<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=['PRDName','PRDPrice','PRDDiscount','image','catigory_id'];//end of fillable
    protected $appends=['img'];//end of appends
    protected $casts=[];//end of casts

    //this section for relationship between the tables
    public function catigory(){
        return $this->belongsTo(Catigory::class);
    }//end of catigory

    //this section for methods on the model
    public function getImgAttribute(){
        return asset('media/productImage/'.$this->image);
    }//end of get image

}
