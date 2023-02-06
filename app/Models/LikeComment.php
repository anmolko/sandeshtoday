<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    use HasFactory;
    protected $table ='likes';
    protected $fillable =['id','user_id','comment_id','like','dislike'];

    public function comment(){
        return $this->belongsTo('App\Models\Comment','comment_id','id' );
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id' );
    }
}
