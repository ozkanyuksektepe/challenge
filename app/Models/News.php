<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','writer_id','title','content','image'];

    public function writer(){
        return $this->hasOne(Writer::class, 'id','writer_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
    }
}
