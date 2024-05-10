<?php

namespace App\Models;

use App\Http\Controllers\admin\tool\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_category extends Model
{
    protected $table = "blog_category";
    protected $guarded = [];

    public static function getSingleName($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $category=blog_category::where("id","=",$id)->get();
            if ($category){
                return $category[0]["name"];
            }
        }
    }

    public static function getSingleNamePermaLink($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $category=blog_category::where("id","=",$id)->get();
            if ($category){
                return $category[0]["permaLink"];
            }
        }
    }

    public static function getCategories()
    {
        $categories=blog_category::get();
        return $categories;
    }
}
