<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

URL::forceScheme('https');

Route::get("/", [Controllers\front\indexController::class, "index"])->middleware("siteCounter")->name("index");
Route::get("/index", [Controllers\front\indexController::class, "index"])->middleware("siteCounter")->name("index2");
Route::get("/index.html", [Controllers\front\indexController::class, "index"])->middleware("siteCounter")->name("index3");
Route::get("/bloglar", [Controllers\front\indexController::class, "blogs"])->middleware("siteCounter")->name("blog");
Route::get("/bloglar.html", [Controllers\front\indexController::class, "blogs"])->middleware("siteCounter")->name("blog");
Route::get("/blog/{id}/{blogname}",[Controllers\front\indexController::class,"single"])->middleware("siteCounter")->name("blogSingle");
Route::get("/blog/{id}/{blogname}.html",[Controllers\front\indexController::class,"single"])->middleware("siteCounter")->name("blogSingle");
Route::get("/kategoriler", [Controllers\front\indexController::class, "categories"])->middleware("siteCounter")->name("categories");
Route::get("/kategoriler.html", [Controllers\front\indexController::class, "categories"])->middleware("siteCounter")->name("categories");
Route::get("/kategori/{id}/{categoryname}", [Controllers\front\indexController::class, "category"])->middleware("siteCounter")->name("category");
Route::get("/kategori/{id}/{categoryname}.html", [Controllers\front\indexController::class, "category"])->middleware("siteCounter")->name("category");
Route::post("/commendCreate/{id}", [Controllers\admin\blog\comment\indexController::class, "store"])->middleware("siteCounter")->name("blogCommentCreate");
Route::get("/sitemap",[Controllers\front\indexController::class,"sitemap"])->middleware("siteCounter")->name("sitemap");
Route::get("/sitemap.xml",[Controllers\front\indexController::class,"sitemap"])->middleware("siteCounter")->name("sitemap2");



// Login Route Start
Route::prefix("login")->as("login.")->group(function (){
    Route::get("/",[Controllers\login\indexController::class,"index"])->name("login");
    Route::get("/index",[Controllers\login\indexController::class,"index"])->name("login");
    Route::post("/create",[Controllers\login\indexController::class,"login"])->name("loginPost");
    Route::get("/logout",[Controllers\login\indexController::class,"logOut"])->name("logOut");

});
// Login Route Finish


// Login Prefix Start
Route::prefix("admin")->as("admin.")->middleware("loginControl")->group(function () {
    Route::get("/", [Controllers\admin\indexController::class, "index"])->name("index");

    // Setting Prefix Start
    Route::prefix("setting")->as("setting.")->group(function () {
        Route::get("/", [Controllers\admin\setting\indexController::class, "index"])->name("index");
        Route::get("/index", [Controllers\admin\setting\indexController::class, "index"])->name("index");
        Route::post("/create", [Controllers\admin\setting\indexController::class, "store"])->name("create");
        Route::post("/update", [Controllers\admin\setting\indexController::class, "update"])->name("update");
    });
    // Setting Prefix Finish

    // Category Prefix Finish
    Route::prefix("category")->as("category.")->group(function () {
        Route::get("/", [Controllers\admin\category\indexController::class, "index"])->name("index");
        Route::get("/index", [Controllers\admin\category\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\category\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\category\indexController::class, "store"])->name("createPost");
        Route::get("/update/{id}", [Controllers\admin\category\indexController::class, "edit"])->name("update");
        Route::post("/update/{id}", [Controllers\admin\category\indexController::class, "update"])->name("updatePost");
        Route::get("/delete/{id}", [Controllers\admin\category\indexController::class, "destroy"])->name("delete");
        Route::get("/popular/{id}", [Controllers\admin\category\indexController::class, "popular"])->name("popular");
        Route::get("/enable/{id}", [Controllers\admin\category\indexController::class, "enable"])->name("enable");
    });
    //  Category Prefix Finish

    //  BlogPrefix Start
    Route::prefix("blog")->as("blog.")->group(function () {
        Route::get("/", [Controllers\admin\blog\indexController::class, "index"])->name("index");
        Route::get("/index", [Controllers\admin\blog\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\blog\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\blog\indexController::class, "store"])->name("createPost");
        Route::get("/update/{id}", [Controllers\admin\blog\indexController::class, "edit"])->name("update");
        Route::post("/update/{id}", [Controllers\admin\blog\indexController::class, "update"])->name("updatePost");
        Route::get("/delete/{id}", [Controllers\admin\blog\indexController::class, "destroy"])->name("delete");
        Route::get("/popular/{id}", [Controllers\admin\blog\indexController::class, "popular"])->name("popular");
        Route::get("/enable/{id}", [Controllers\admin\blog\indexController::class, "enable"])->name("enable");
        Route::get("/carousel/{id}",[Controllers\admin\blog\indexController::class,"carousel"])->name("carousel");

        //  Detail Prefix Start
        Route::prefix("detail")->as("detail.")->group(function () {
            Route::get("/{id}", [Controllers\admin\blog\detail\indexController::class, "index"])->name("index");
            Route::get("/create/{id}", [Controllers\admin\blog\detail\indexController::class, "create"])->name("create");
            Route::post("/create/{id}", [Controllers\admin\blog\detail\indexController::class, "store"])->name("createPost");
            Route::get("/update/{id}", [Controllers\admin\blog\detail\indexController::class, "edit"])->name("update");
            Route::post("/update/{id}", [Controllers\admin\blog\detail\indexController::class, "update"])->name("updatePost");
            Route::get("/delete/{id}", [Controllers\admin\blog\detail\indexController::class, "destroy"])->name("delete");
        });
        //  Detail Prefix Finish

        //  Comment Prefix start
        Route::prefix("comment")->as("comment.")->group(function () {
            Route::get("/", [Controllers\admin\blog\comment\indexController::class, "all"])->name("all");
            Route::get("/{id}", [Controllers\admin\blog\comment\indexController::class, "index"])->name("index");
            Route::get("/delete/{id}", [Controllers\admin\blog\comment\indexController::class, "destroy"])->name("delete");
            Route::get("/enable/{id}", [Controllers\admin\blog\comment\indexController::class, "enable"])->name("enable");

        });
        //  CommentPrefix Finish
    });
    //  Blog Prefix Finish

});
// Admin Prefix Finish
