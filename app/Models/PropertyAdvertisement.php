<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAdvertisement extends Model
{
    use HasFactory;
    protected $table ='property_advertisements';
    protected $fillable =['id','name','url','amount','image','status','created_by','updated_by'];

}
