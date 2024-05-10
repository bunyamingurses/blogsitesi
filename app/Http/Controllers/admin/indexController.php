<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        return View("admin.index");
    }

}
