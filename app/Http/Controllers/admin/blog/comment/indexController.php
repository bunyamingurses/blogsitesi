<?php

namespace App\Http\Controllers\admin\blog\comment;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_blog;
use App\Models\blog_comment;
use App\Models\blog_setting;
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
            $comment = blog_comment::where("blog_id", "=", $id)->get();
            if ($comment) {
                return View("admin.blog.comment.index", ["comment" => $comment]);
            } else {
                return redirect()->back()->with("status", "Blog için yorum bulunmamakta.");
            }
        }
    }

    public function all()
    {

        $comment = blog_comment::get();
        if ($comment) {
            return View("admin.blog.comment.all", ["comment" => $comment]);
        } else {
            return redirect()->back()->with("status", "Blog için yorum bulunmamakta.");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {

        if ($_POST["g-recaptcha-response"] != null) {

            if (isset($id) & isset($request->name) && isset($request->email) && isset($request->comment)) {
                $blogId = functionController::security($id);
                $name = functionController::security($request->name);
                $email = functionController::security($request->mail);
                $comment = functionController::security($request->comment);

                $all=[
                    "name"=>$name,
                    "email"=>$email,
                    "comment"=>$comment,
                    "blog_id"=>$blogId
                    ];
                $create=blog_comment::create($all);
                if ($create){
                    return redirect()->back()->with("status","Yorumunuz eklendi onaylanınca yayınlanacaktır.");
                }else{
                    return redirect()->back()->with("status","Yorumunuz eklenemedi.");
                }

            }else{
                return redirect()->back()->with("status","Lütfen boş alan bırakmayın. ");
            }
        }else{
            return redirect()->back()->with("status","Lütfen \"Ben Robot Değilim'i İşaretleyin.\" ");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $commentControl=blog_comment::where("id","=",$id)->get();
            if ($commentControl){
                $delete=blog_comment::where("id","=",$id)->delete();
                if ($delete){
                    return redirect()->back()->with("status","Yorum silindi. ");
                }else{
                    return redirect()->back()->with("status","Yorum silinemedi. ");
                }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }


    public function enable($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $commentControl=blog_comment::where("id","=",$id)->get();
            if ($commentControl){
                $all=[
                    "enable"=>1
                ];
                $update=blog_comment::where("id","=",$id)->update($all);
                if ($update){
                    return redirect()->back()->with("status","Yorum aktifleştirildi. ");
                }else{
                    return redirect()->back()->with("status","Yorum aktifleştirilemedi.. ");
                }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }


}
