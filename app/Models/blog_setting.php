<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_setting extends Model
{
    protected $table="blog_setting";
    protected $guarded=[];

    public static function getSiteUrl()
    {
        $url=blog_setting::where("id","=",1)->get();
        return $url[0]["siteUrl"];
    }

    public static function getSiteSingle($text)
    {
        $url=blog_setting::where("id","=",1)->get();
        return $url[0][$text];
    }


}
