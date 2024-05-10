<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_blog;
use App\Models\blog_blogDetail;
use App\Models\blog_category;
use App\Models\blog_setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return View("front.index");
    }

    // Blog Start
    public function blogs()
    {
        $blog = blog_blog::where("isEnable", "=", 1)->paginate(10);
        $popular=blog_blog::where("isPopular","=",1)->limit(5)->get();
        return View("front.blogs", ["blog" => $blog,"popular"=>$popular]);
    }

    public function single(Request $request, $id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $blog = blog_blog::where("id", "=", $id)->where("isEnable", "=", 1)->get();
            if ($blog) {
                $details=blog_blogDetail::where("blog_id","=",$blog[0]["id"])->get();
                return View("front.blogSingle",["blog"=>$blog,"details"=>$details]);
            }else{
                return redirect(route("index"));
            }
        }
    }
    // Blog Finish

    // Category Start
    public function categories()
    {
        $categories=blog_category::where("isEnable","=",1)->paginate(10);
        return View("front.categories",["categories"=>$categories]);
    }

    public function category(Request $request, $id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $category = blog_category::where("id", "=", $id)->where("isEnable", "=", 1)->get();
            if ($category) {
                $blogs=blog_blog::where("categoryId","=",$category[0]["id"])->paginate(10);
                return View("front.categorySingle",["category"=>$category,"blogs"=>$blogs]);
            }else{
                return redirect(route("index"));
            }
        }
    }
    // Category Finish


    // Sitemap Start
    public function sitemap()
    {
        header('Content-type: Application/xml; charset="utf8"', true);
        $xml_path = blog_setting::getSiteSingle("siteUrl")."/sitemap.xml";
        define("PATH",blog_setting::getSiteSingle("siteUrl"));

        $xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml_output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml_output.="<url><loc>".PATH."/</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";

        $xml_output.="<url><loc>".PATH."/index.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/bloglar.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/kategoriler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";

        $blog = blog_blog::where("isEnable","=",1)->get();
        foreach($blog as $blogYaz) {
            $xml_output.="<url><loc>".PATH."/blog/".$blogYaz->id."/".$blogYaz->permalink.".html"."</loc><lastmod>".substr($blogYaz->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }

        $kategori = blog_category::where("isEnable","=",1)->get();
        foreach($kategori as $kategoriYaz) {
            $xml_output.="<url><loc>".PATH."/kategori/".$kategoriYaz->id."/".functionController::seo($kategoriYaz->name).".html"."</loc><lastmod>".substr($kategoriYaz->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }


        $xml_output .= "</urlset>";


        print_r($xml_output);
    }

    // SitemapFinish



}
