<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'writers';
    protected $fillable = ['user_id','writer_name','created_at','updated_at'];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}
