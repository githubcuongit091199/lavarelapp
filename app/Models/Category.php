<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'type'
    ];// thuộc tính trong create profile
    public function tags(){
        return $this->hasMany('App\Models\Tag');
    }

}
