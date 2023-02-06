<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ='settings';
    protected $fillable =['id','website_name','linkedin','favicon','theme_mode','website_description','logo_white','phone','mobile','whatsapp','viber','facebook','youtube','instagram','ticktock','address','email','meta_title','meta_tags','meta_description','google_analytics','broadcasting_registration','company_registration','chairman','operator','editor','news_email','ad_email','ad_number','google_map','meta_pixel','privacy_policy','terms_conditions','grievance_link','grievance_button','grievance_description','grievance_heading','created_by','updated_by'];
}
