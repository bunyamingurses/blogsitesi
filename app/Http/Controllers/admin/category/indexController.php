<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_blog;
use App\Models\blog_category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = blog_category::get();
        return View("admin.category.index", ["category" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] != "bnymngrss") {
            return redirect(route("admin.category.index"))->with("status", "Kategori eklemeye yetkiniz bulunmamaktadır.");
        } else {
            return View("admin.category.create");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            if (isset($request->categoryName) && isset($request->categoryDescription) && isset($request->categoryImage)) {
                $name = functionController::security($request->categoryName);
                $description = functionController::security($request->categoryDescription);
                if (functionController::resimTurKontrol($request->file("categoryImage")->getClientOriginalExtension()) == 1) {
                    $image = functionController::imageCreate($request, "category", "categoryImage");
                    $imageWebp = functionController::imageCreateWebp($request, "category", "categoryImage");
                    $all = [
                        "name" => $name,
                        "description" => $description." Hakkında Bloglar",
                        "addUserId" => 2,
                        "image" => $image,
                        "imageWebp" => $imageWebp,
                        "permaLink" => functionController::seo($name)
                    ];

                    $create = blog_category::create($all);
                    if ($create) {
                        return redirect(route("admin.category.index"))->with("status", "Kategori eklendi.");
                    } else {
                        return redirect(route("admin.category.index"))->with("status", "Kategori eklenemedi.");
                    }


                } else {
                    return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            if (isset($id)) {
                $category = blog_category::where("id", "=", functionController::security($id))->get();
                if ($category) {
                    return View("admin.category.update", ["category" => $category]);
                } else {
                    return redirect(route("admin.category.index"));
                }

            } else {
                return redirect(route("admin.category.index"));
            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            $id = functionController::security($id);
            if (isset($request->categoryImage)) {
                if (isset($request->categoryName) && isset($request->categoryDescription) && isset($request->categoryImage)) {
                    $name = functionController::security($request->categoryName);
                    $description = functionController::security($request->categoryDescription);
                    if (functionController::resimTurKontrol($request->file("categoryImage")->getClientOriginalExtension()) == 1) {
                        $image = functionController::imageCreate($request, "category", "categoryImage");
                        $imageWebp = functionController::imageCreateWebp($request, "category", "categoryImage");
                        $all = [
                            "name" => $name,
                            "description" => $description,
                            "image" => $image,
                            "imageWebp" => $imageWebp,
                            "permaLink" => functionController::seo($name)
                        ];

                        $update = blog_category::where("id", "=", $id)->update($all);
                        if ($update) {
                            return redirect(route("admin.category.index"))->with("status", "Kategori güncellendi.");
                        } else {
                            return redirect(route("admin.category.index"))->with("status", "Kategori güncellenemedi.");
                        }


                    } else {
                        return redirect()->back()->with("status", "Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                    }
                } else {
                    return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
                }
            } else {
                if (isset($request->categoryName) && isset($request->categoryDescription)) {
                    $name = functionController::security($request->categoryName);
                    $description = functionController::security($request->categoryDescription);
                    $all = [
                        "name" => $name,
                        "description" => $description,
                        "permaLink" => functionController::seo($name)
                    ];

                    $update = blog_category::where("id", "=", $id)->update($all);
                    if ($update) {
                        return redirect(route("admin.category.index"))->with("status", "Kategori güncellendi.");
                    } else {
                        return redirect(route("admin.category.index"))->with("status", "Kategori güncellenemedi.");
                    }


                } else {
                    return redirect()->back()->with("status", "Lütfen boş alan bırakmayın.");
                }
            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            if (isset($id)) {
                $id = functionController::security($id);
                $blogsGet = blog_blog::where("categoryId", "=", $id)->get();
                if (empty($blogsGet)) {
                    return redirect(route("admin.category.index"))->with("status", "Kategoriye ait bloglar bulunmakta. Önce bloglar silinmeli.");
                } else {
                    $sil = blog_category::where("id", "=", $id)->delete();
                    if ($sil) {
                        return redirect(route("admin.category.index"))->with("status", "Kategori silindi.");
                    } else {
                        return redirect(route("admin.category.index"))->with("status", "Kategori silinemedi.");
                    }
                }
            } else {
                return redirect(route("admin.category.index"));

            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }
    }

    public function enable($id)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            if (isset($id)) {
                $id = functionController::security($id);
                $category = blog_category::where("id", "=", $id)->get();
                if (isset($category)) {
                    if ($category[0]["isEnable"] == 1) {
                        $all = [
                            "isEnable" => 0
                        ];
                        $aktif = blog_category::where("id", "=", $id)->update($all);
                        if ($aktif) {
                            return redirect()->back()->with("status", "Kategori pasifleştirildi.");
                        } else {
                            return redirect()->back()->with("status", "Kategori pasifleştirilemedi.");
                        }
                    } else {
                        $all = [
                            "isEnable" => 1
                        ];
                        $aktif = blog_category::where("id", "=", $id)->update($all);
                        if ($aktif) {
                            return redirect()->back()->with("status", "Kategori aktifleştirildi.");
                        } else {
                            return redirect()->back()->with("status", "Kategori aktifleştirilemedi.");
                        }
                    }
                } else {
                    return redirect(route("admin.index"));
                }
            } else {
                return redirect(route("admin.category.index"));
            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }
    }

    public function popular($id)
    {
        $userInfo = session("userInfo");
        if ($userInfo["username"] == "bnymngrss") {
            if (isset($id)) {
                $id = functionController::security($id);
                $category = blog_category::where("id", "=", $id)->get();
                if (isset($category)) {
                    if ($category[0]["isPopular"] == 1) {
                        $all = [
                            "isPopular" => 0
                        ];
                        $aktif = blog_category::where("id", "=", $id)->update($all);
                        if ($aktif) {
                            return redirect()->back()->with("status", "Kategori popüler listesinden çıkarıldı.");
                        } else {
                            return redirect()->back()->with("status", "Kategori popüler listesinden çıkarılamadı.");
                        }
                    } else {
                        $all = [
                            "isPopular" => 1
                        ];
                        $aktif = blog_category::where("id", "=", $id)->update($all);
                        if ($aktif) {
                            return redirect()->back()->with("status", "Kategori popüler listesine eklendi.");
                        } else {
                            return redirect()->back()->with("status", "Kategori popüler listesine eklenemedi.");
                        }
                    }
                } else {
                    return redirect(route("admin.index"));
                }
            } else {
                return redirect(route("admin.category.index"));
            }
        } else {
            return redirect(route("admin.index"))->with("status", "Yetkinizin olmadığı işlemler yapamazsınız. Lütfen tekrar denemeyin.");
        }
    }
}
