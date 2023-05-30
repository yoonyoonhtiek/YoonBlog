<?php

namespace App\Models;

// use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{      protected $fillable = ['title', 'body','category_id', 'user_id', 'updated_at', 'created_at'];
   
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    use HasFactory;
}
