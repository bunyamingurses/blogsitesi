<?php

namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_blog;
use App\Models\blog_blogDetail;
use App\Models\blog_category;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = blog_blog::orderBy("id","desc")->get();
        return View("admin.blog.index", ["blog" => $blog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = blog_category::get();
        return View("admin.blog.create", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->blogName) && isset($request->categoryId) && isset($request->blogTags) && isset($request->blogImage)) {
            $name = functionController::security($request->blogName);
            $tags=functionController::security($request->blogTags);
            $categoryId = $request->categoryId;
            if (functionController::resimTurKontrol($request->file("blogImage")->getClientOriginalExtension()) == 1) {
                $image = functionController::imageCreate($request, "blog", "blogImage");
                $imageWebp = functionController::imageCreateWebp($request, "blog", "blogImage");
                $all = [
                    "name" => $name,
                    "tags"=>$tags,
                    "image" => $image,
                    "imageWebp" => $imageWebp,
                    "categoryId" => $categoryId,
                    "permaLink" => functionController::seo($name)
                ];

                $create = blog_blog::create($all);
                if ($create) {
                    return redirect(route("admin.blog.index"))->with("status", "Blog eklendi.");
                } else {
                    return redirect(route("admin.blog.index"))->with("status", "Blog eklenemedi.");
                }
            } else {
                return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
            }
        } else {
            return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $blog = blog_blog::where("id", "=", $id)->get();
            $category = blog_category::get();
            if ($blog) {
                return View("admin.blog.update", ["blog" => $blog, "category" => $category]);
            } else {
                return redirect(route("admin.blog.index"));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->blogImage)) {
            if (isset($request->blogName) && isset($request->categoryId) && isset($request->blogTags) && isset($request->blogImage)) {
                $name = functionController::security($request->blogName);
                $tags=functionController::security($request->blogTags);
                $categoryId = $request->categoryId;
                if (functionController::resimTurKontrol($request->file("blogImage")->getClientOriginalExtension()) == 1) {
                    $image = functionController::imageCreate($request, "blog", "blogImage");
                    $imageWebp = functionController::imageCreateWebp($request, "blog", "blogImage");
                    $all = [
                        "name" => $name,
                        "tags"=>$tags,
                        "image" => $image,
                        "imageWebp" => $imageWebp,
                        "categoryId" => $categoryId,
                        "permaLink" => functionController::seo($name)
                    ];

                    $create = blog_blog::where("id", "=", $id)->update($all);
                    if ($create) {
                        return redirect(route("admin.blog.index"))->with("status", "Blog güncellendi.");
                    } else {
                        return redirect(route("admin.blog.index"))->with("status", "Blog güncellenemedi.");
                    }
                } else {
                    return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        } else {
            if (isset($request->blogName) && isset($request->categoryId) && isset($request->blogTags)) {
                $name = functionController::security($request->blogName);
                $tags=functionController::security($request->blogTags);
                $categoryId = $request->categoryId;

                $all = [
                    "name" => $name,
                    "tags"=>$tags,
                    "categoryId" => $categoryId,
                    "permaLink" => functionController::seo($name)
                ];

                $create = blog_blog::where("id","=",$id)->update($all);
                if ($create) {
                    return redirect(route("admin.blog.index"))->with("status", "Blog güncellendi.");
                } else {
                    return redirect(route("admin.blog.index"))->with("status", "Blog güncellenemedi.");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $detailsGet=blog_blogDetail::where("blog_id","=",$id)->get();
            if (isset($detailsGet[0]["id"])){
                return redirect(route("admin.blog.index"))->with("status","Bloğa ait içerikler bulunmakta. Önce içerikler silinmeli.");
            }else{
                $sil=blog_blog::where("id","=",$id)->delete();
                if ($sil){
                    return redirect(route("admin.blog.index"))->with("status","Blog silindi.");
                }else{
                    return redirect(route("admin.blog.index"))->with("status","Blog silinemedi.");
                }
            }
        }else{
            return redirect(route("admin.blog.index"));

        }
    }

    public function enable($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $blog=blog_blog::where("id","=",$id)->get();
            if (isset($blog)){
                if ($blog[0]["isEnable"]==1){
                    $all=[
                        "isEnable"=>0
                    ];
                    $aktif=blog_blog::where("id","=",$id)->update($all);
                    if ($aktif){
                        return redirect()->back()->with("status","Blog pasifleştirildi.");
                    }else{
                        return redirect()->back()->with("status","Blog pasifleştirilemedi.");
                    }
                }else{
                    $all=[
                        "isEnable"=>1
                    ];
                    $aktif=blog_blog::where("id","=",$id)->update($all);
                    if ($aktif){
                        return redirect()->back()->with("status","Blog aktifleştirildi.");
                    }else{
                        return redirect()->back()->with("status","Blog aktifleştirilemedi.");
                    }
                }
            }else{
                return redirect(route("admin.index"));
            }
        }else{
            return redirect(route("admin.blog.index"));
        }
    }

    public function popular($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $blog=blog_blog::where("id","=",$id)->get();
            if (isset($blog)){
                if ($blog[0]["isPopular"]==1){
                    $all=[
                        "isPopular"=>0
                    ];
                    $aktif=blog_blog::where("id","=",$id)->update($all);
                    if ($aktif){
                        return redirect()->back()->with("status","Blog popüler listesinden çıkarıldı.");
                    }else{
                        return redirect()->back()->with("status","Blog popüler listesinden çıkarılamadı.");
                    }
                }else{
                    $all=[
                        "isPopular"=>1
                    ];
                    $aktif=blog_blog::where("id","=",$id)->update($all);
                    if ($aktif){
                        return redirect()->back()->with("status","Blog popüler listesine eklendi.");
                    }else{
                        return redirect()->back()->with("status","Blog popüler listesine eklenemedi.");
                    }
                }
            }else{
                return redirect(route("admin.index"));
            }
        }else{
            return redirect(route("admin.blog.index"));
        }
    }

    public function carousel($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $blog=blog_blog::where("id","=",$id)->get();
            if (isset($blog)){
                if ($blog[0]["isCarousel"]==1){
                    $all=[
                        "isCarousel"=>0
                    ];
                    $carousel=blog_blog::where("id","=",$id)->update($all);
                    if ($carousel){
                        return redirect()->back()->with("status","Blog carousel listesinden çıkarıldı.");
                    }else{
                        return redirect()->back()->with("status","Blog carousel listesinden çıkarılamadı.");
                    }
                }else{
                    $all=[
                        "isCarousel"=>1
                    ];
                    $carousel=blog_blog::where("id","=",$id)->update($all);
                    if ($carousel){
                        return redirect()->back()->with("status","Blog carousel listesine eklendi.");
                    }else{
                        return redirect()->back()->with("status","Blog carousel listesine eklenemedi.");
                    }
                }
            }else{
                return redirect(route("admin.index"));
            }
        }else{
            return redirect(route("admin.blog.index"));
        }
    }
}
