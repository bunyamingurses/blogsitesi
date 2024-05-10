<?php

namespace App\Http\Controllers\admin\blog\detail;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_blog;
use App\Models\blog_blogDetail;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $blog = blog_blog::where("id", "=", $id)->get();
            if ($blog) {
                $detail = blog_blogDetail::where("blog_id", "=", $id)->get();
                if ($detail) {
                    return View("admin.blog.detail.index", ["blog" => $blog, "detail" => $detail]);
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $blog = blog_blog::where("id", "=", $id)->get();
            if ($blog) {
                return View("admin.blog.detail.create", ["id" => $id]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        if (isset($request->detailImage)) {
            if (isset($request->detailText) && isset($request->detailImage)) {
                $text = functionController::security($request->detailText);
                $blog_id = functionController::security($id);
                if (functionController::resimTurKontrol($request->file("detailImage")->getClientOriginalExtension()) == 1) {
                    $image = functionController::imageCreate($request, "blog/detail", "detailImage");
                    $imageWebp = functionController::imageCreateWebp($request, "blog/detail", "detailImage");
                    $all = [
                        "text" => $text,
                        "image" => $image,
                        "imageWebp" => $imageWebp,
                        "blog_id" => $blog_id,

                    ];
                    $create = blog_blogDetail::create($all);
                    if ($create) {
                        return redirect(route("admin.blog.detail.index", ["id" => $id]))->with("status", "İçerik eklendi.");
                    } else {
                        return redirect(route("admin.blog.detail.index", ["id" => $id]))->with("status", "İçerik eklenemedi.");
                    }
                } else {
                    return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        } else {
            if (isset($request->detailText)) {
                $text = functionController::security($request->detailText);
                $blog_id = functionController::security($id);
                $all = [
                    "text" => $text,
                    "blog_id" => $blog_id,
                ];
                $create = blog_blogDetail::create($all);
                if ($create) {
                    return redirect(route("admin.blog.detail.index", ["id" => $id]))->with("status", "İçerik eklendi.");
                } else {
                    return redirect(route("admin.blog.detail.index", ["id" => $id]))->with("status", "İçerik eklenemedi.");
                }

            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $detail = blog_blogDetail::where("id", "=", $id)->get();
            if ($detail) {
                return View("admin.blog.detail.update", ["id" => $id,"detail"=>$detail]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (isset($request->detailImage)) {
            if (isset($request->detailText) && isset($request->detailImage)) {
                $text = functionController::security($request->detailText);
                $detailId = functionController::security($id);
                $blog_id=blog_blogDetail::where("id","=",$detailId)->get();
                if (functionController::resimTurKontrol($request->file("detailImage")->getClientOriginalExtension()) == 1) {
                    $image = functionController::imageCreate($request, "blog/detail", "detailImage");
                    $imageWebp = functionController::imageCreateWebp($request, "blog/detail", "detailImage");
                    $all = [
                        "text" => $text,
                        "image" => $image,
                        "imageWebp" => $imageWebp,

                    ];
                    $update = blog_blogDetail::where("id","=",$detailId)->update($all);
                    if ($update) {
                        return redirect(route("admin.blog.detail.index", ["id" => $blog_id[0]["blog_id"]]))->with("status", "İçerik güncellendi.");
                    } else {
                        return redirect(route("admin.blog.detail.index", ["id" => $blog_id[0]["blog_id"]]))->with("status", "İçerik güncellenemedi.");
                    }
                } else {
                    return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        } else {
            if (isset($request->detailText)) {
                $text = functionController::security($request->detailText);
                $detailId = functionController::security($id);
                $blog_id=blog_blogDetail::where("id","=",$detailId)->get();
                $all = [
                    "text" => $text,
                ];
                $update = blog_blogDetail::where("id","=",$detailId)->update($all);
                if ($update) {
                    return redirect(route("admin.blog.detail.index", ["id" => $blog_id[0]["blog_id"]]))->with("status", "İçerik güncellendi.");
                } else {
                    return redirect(route("admin.blog.detail.index", ["id" => $blog_id[0]["blog_id"]]))->with("status", "İçerik güncellenemedi.");
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
            $detail=blog_blogDetail::where("id","=",$id)->get();
            if ($detail){
                $delete=blog_blogDetail::where("id","=",$id)->delete();
                if ($delete){
                    return redirect(route("admin.blog.detail.index",["id"=>$detail[0]["blog_id"]]))->with("status","İçerik silindi");
                }else{
                    return redirect(route("admin.blog.detail.index",["id"=>$detail[0]["blog_id"]]))->with("status","İçerik silinemedi");
                }
            }
        }
    }
}
