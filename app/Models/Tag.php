<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table ='tags';
    protected $fillable = ['id','name','slug','description','created_by','updated_by'];

    public function blogs(){
        return $this->belongsToMany('App\Models\Blog');
    }

    public function BlogsCount()
    {
        return $this->belongsToMany('App\Models\Blog')->count();
    }
}
