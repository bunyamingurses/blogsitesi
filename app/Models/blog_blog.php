<?php

namespace App\Models;

use App\Http\Controllers\admin\tool\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_blog extends Model
{
    protected $table="blog_blog";
    protected $guarded=[];

    public static function getSingleName($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $blog=blog_blog::where("id","=",$id)->get();
            if ($blog){
                return $blog[0]["name"];
            }
        }
    }

    public static function categoryCount($id)
    {
        $id=functionController::security($id);
        $category=blog_blog::where("categoryId","=",$id)->count();
        return $category;
    }
    
}
