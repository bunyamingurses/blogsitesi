<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\blog_setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = blog_setting::where("id", "=", 1)->get();
        return View("admin.setting.index", ["setting" => $setting]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (isset($request->siteLogo)) {
            if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhone) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)) {
                if (functionController::resimTurKontrol($request->file("siteLogo")->getClientOriginalExtension())==1){
                    $logo=functionController::imageCreate($request,"site","siteLogo");
                    $logoWebp=functionController::imageCreateWebp($request,"site","siteLogo");
                    $url=functionController::security($request->siteUrl);
                    $title=functionController::security($request->siteTitle);
                    $description=functionController::security($request->siteDescription);
                    $keyword=functionController::security($request->siteKeyword);
                    $author=functionController::security($request->siteAuthor);
                    $phone=functionController::security($request->sitePhone);
                    $email=functionController::security($request->siteEmail);
                    $googleMap=functionController::security($request->siteGoogleMap);
                    $googleAnalytics=functionController::security($request->siteGoogleAnalytics);

                    $all=[
                      "logo"=>$logo,
                      "logoWebp"=>$logoWebp,
                      "siteUrl"=>$url,
                        "title"=>$title,
                        "description"=>$description,
                        "keyword"=>$keyword,
                        "author"=>$author,
                        "phoneNumber"=>$phone,
                        "email"=>$email,
                        "googleMap"=>$googleMap,
                        "googleAnalytics"=>$googleAnalytics
                    ];

                    $create=blog_setting::create($all);
                    if ($create){
                        return redirect()->back()->with("status","Site title bilgileri eklendi.");
                    }else{
                        return redirect()->back()->with("status","Site title bilgileri eklenemedi.");
                    }
                }else{
                    return redirect()->back()->with("status","Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            }else{
                return redirect()->back()->with("status","Lütfen eksik bilgi girmeyin..");
            }
        }else{
            if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhone) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)) {
                $url=functionController::security($request->siteUrl);
                $title=functionController::security($request->siteTitle);
                $description=functionController::security($request->siteDescription);
                $keyword=functionController::security($request->siteKeyword);
                $author=functionController::security($request->siteAuthor);
                $phone=functionController::security($request->sitePhone);
                $email=functionController::security($request->siteEmail);
                $googleMap=functionController::security($request->siteGoogleMap);
                $googleAnalytics=functionController::security($request->siteGoogleAnalytics);

                $all=[
                    "siteUrl"=>$url,
                    "title"=>$title,
                    "description"=>$description,
                    "keyword"=>$keyword,
                    "author"=>$author,
                    "phoneNumber"=>$phone,
                    "email"=>$email,
                    "googleMap"=>$googleMap,
                    "googleAnalytics"=>$googleAnalytics
                ];

                $create=blog_setting::create($all);
                if ($create){
                    return redirect()->back()->with("status","Site title bilgileri eklendi.");
                }else{
                    return redirect()->back()->with("status","Site title bilgileri eklenemedi.");
                }
            }else{
                return redirect()->back()->with("status","Lütfen eksik bilgi girmeyin..");
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if (isset($request->siteLogo)) {
            if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhone) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)) {
                if (functionController::resimTurKontrol($request->file("siteLogo")->getClientOriginalExtension())==1){
                    $logo=functionController::imageCreate($request,"site","siteLogo");
                    $logoWebp=functionController::imageCreateWebp($request,"site","siteLogo");
                    $url=functionController::security($request->siteUrl);
                    $title=functionController::security($request->siteTitle);
                    $description=functionController::security($request->siteDescription);
                    $keyword=functionController::security($request->siteKeyword);
                    $author=functionController::security($request->siteAuthor);
                    $phone=functionController::security($request->sitePhone);
                    $email=functionController::security($request->siteEmail);
                    $googleMap=functionController::security($request->siteGoogleMap);
                    $googleAnalytics=functionController::security($request->siteGoogleAnalytics);

                    $all=[
                        "logo"=>$logo,
                        "logoWebp"=>$logoWebp,
                        "siteUrl"=>$url,
                        "title"=>$title,
                        "description"=>$description,
                        "keyword"=>$keyword,
                        "author"=>$author,
                        "phoneNumber"=>$phone,
                        "email"=>$email,
                        "googleMap"=>$googleMap,
                        "googleAnalytics"=>$googleAnalytics
                    ];

                    $update=blog_setting::where("id","=",1)->update($all);
                    if ($update){
                        return redirect()->back()->with("status","Site title bilgileri güncellendi.");
                    }else{
                        return redirect()->back()->with("status","Site title bilgileri güncellendi.");
                    }
                }else{
                    return redirect()->back()->with("status","Sadece \"JPG\", \"JPEG\" ve \"PNG\" türleri desteklenmektedir!");
                }
            }else{
                return redirect()->back()->with("status","Lütfen eksik bilgi girmeyin..");
            }
        }else{
            if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhone) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)) {
                $url=functionController::security($request->siteUrl);
                $title=functionController::security($request->siteTitle);
                $description=functionController::security($request->siteDescription);
                $keyword=functionController::security($request->siteKeyword);
                $author=functionController::security($request->siteAuthor);
                $phone=functionController::security($request->sitePhone);
                $email=functionController::security($request->siteEmail);
                $googleMap=functionController::security($request->siteGoogleMap);
                $googleAnalytics=functionController::security($request->siteGoogleAnalytics);

                $all=[
                    "siteUrl"=>$url,
                    "title"=>$title,
                    "description"=>$description,
                    "keyword"=>$keyword,
                    "author"=>$author,
                    "phoneNumber"=>$phone,
                    "email"=>$email,
                    "googleMap"=>$googleMap,
                    "googleAnalytics"=>$googleAnalytics
                ];

                $update=blog_setting::where("id","=",1)->update($all);
                if ($update){
                    return redirect()->back()->with("status","Site title bilgileri güncellendi.");
                }else{
                    return redirect()->back()->with("status","Site title bilgileri güncellendi.");
                }
            }else{
                return redirect()->back()->with("status","Lütfen eksik bilgi girmeyin..");
            }
        }
    }

}
