<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{      protected $fillable = ['content', 'article_id', 'user_id', 'updated_at', 'created_at'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
}
