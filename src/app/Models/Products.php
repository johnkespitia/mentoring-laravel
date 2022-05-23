<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function category(){
        //return $this->hasOne(Categories::class, 'id','category_id');
        return $this->belongsTo(Categories::class);
    }
}
