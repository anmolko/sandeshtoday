<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable =['id','name','slug','description','parent_category','created_by','updated_by'];

    public function blogs(){
        return $this->belongsToMany('App\Models\Blog');
    }

    public function BlogsCount()
    {
        return $this->belongsToMany('App\Models\Blog')->count();
    }

    public function hasChildren(){
        return Category::where('parent_category',$this->id)->count()>0;
    }

    public function parentCategoryName(){
        return Category::where('id',$this->parent_category)->first()->name;
    }

    public function children(){
        $children = Category::where('parent_category',$this->id)->get();
        return $children;
    }
}
