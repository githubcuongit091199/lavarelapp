<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag','price','description','image','categories_id','quatity'
    ];
    
    public function articles() {      
        return $this->belongsTo('Articles');
    }
}
