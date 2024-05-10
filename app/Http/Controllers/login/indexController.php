<?php

namespace App\Http\Controllers\login;

use Anhskohbo\NoCaptcha\NoCaptcha;
use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        if (session("userInfo")) {
            return redirect(route("admin.index"));
        } else {
            return View("login.index");
        }
    }

    public function login(Request $request)
    {
        if (session("userInfo")) {
            return redirect(route("admin.index"));
        } else {
            if ($_POST["g-recaptcha-response"] != null) {
                if (isset($request->userUsername) && isset($request->userPassword)) {
                    $username = functionController::security($request->userUsername);
                    $password = functionController::security($request->userPassword);

                    if ($username=="kullaniciadi") {
                        if ($password=="parola") {
                            $usernameControl=[
                                "username"=>$username,
                                "password"=>$password
                            ];
                            Session::put("userInfo", $usernameControl);
                            return redirect(route("admin.index"));
                        } else {
                            return redirect(route("login.login"))->with("status", "Parola bilgisi yanlış girildi.");
                        }
                    } else {
                        return redirect(route("login.login"))->with("status", "Kullanıcıadı bilgisi yanlış girildi.");
                    }
                } else {
                    return redirect(route("login.login"))->with("status", "Lütfen boş alan bırakmayın.");
                }
            } else {
                return redirect(route("login.login"))->with("status", "Lütfen ben robot değilim'i işaretleyin.");
            }
        }
    }

    public function logOut(Request $request)
    {
        $request->session()->flush();
        if (session("userInfo")){
            return redirect()->back()->with("status","Çıkış işlemi başarılamadı.");
        }else{
            return redirect(route("login.login"));
        }
    }




}
