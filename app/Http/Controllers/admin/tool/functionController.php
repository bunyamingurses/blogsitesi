<?php

namespace App\Http\Controllers\admin\tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class functionController extends Controller
{
    public static function imageCreate(Request $request,$path,$name)
    {
        $image=$request->file($name);
        $name=rand(100000000,999999999).".".$image->getClientOriginalExtension();
        $image2=\Intervention\Image\Facades\Image::make($image->getRealPath());
        $image2->save(public_path("images/$path/".$name));
        return $name;

    }


    public static function imageCreateWebp(Request $request,$path,$name)
    {
        $image=$request->file($name);
        $name=rand(100000000,999999999).".webp";
        $image2=\Intervention\Image\Facades\Image::make($image->getRealPath());
        $image2->save(public_path("imagesWebp/$path/".$name))->stream("webp",50);
        $image2->resize(300,300);
        $image2->save(public_path("imagesWebp/$path/small/".$name))->stream("webp",50);

        return $name;

    }





    static function security($text)
    {
        $text = trim($text);
        $text = stripcslashes($text);
        $text = htmlspecialchars($text);
        $text=str_replace("insert","",$text);
        $text=str_replace("INSERT","",$text);
        $text=str_replace("SELECT","",$text);
        $text=str_replace("select","",$text);
        $text=str_replace("exec","",$text);
        $text=str_replace("EXEC","",$text);
        $text=str_replace("UNION","",$text);
        $text=str_replace("union","",$text);
        $text=str_replace("drop","",$text);
        $text=str_replace("DROP","",$text);
        $text=str_replace("UPDATE","",$text);
        $text=str_replace("update","",$text);
        $text=str_replace("delete","",$text);
        $text=str_replace("DELETE","",$text);
        $text=str_replace("script","",$text);
        $text=str_replace("SCRİPT","",$text);
        $text=str_replace("or 1 = 1","",$text);
        $text=str_replace("OR 1 = 1","",$text);
        return $text;
    }

    static function resimTurKontrol($param)
    {
        $izin_verilen = array("image/png", "image/jpg", "image/jpeg", "png", "jpg", "jpeg");
        if (in_array($param, $izin_verilen)) {
            return 1;
        } else {
            return 0;
        }
    }


    static function seo($bul)
    {
        $bulunacak = array(';', '?', '=', 'é', '%', '!', '#', '+', '&#8203;', '.', '?', '!', "’", "'", 'ç', 'Ç', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']', ':', '"', '/', ' ', '|', '”', '“', '–', '&', ' ', '&#160;', '•', '‘', '*', '.', '®');
        $degistir  = array('', '', '', '', '-', '-', '-', '-', '', '', '', '', "", "", 'c', 'C', 'i', 'I', 'g', 'G', 'u', 'o', 'S', 's', 'O', 'U', '', '-', '', '', '', '', '', '', '-', '', '', '', '', '-', '', '-', '-', '', '', '', '', '');
        $sonuc = str_replace($bulunacak, $degistir, $bul);
        $sonuc = strtolower($sonuc);
        return $sonuc;
    }


    static function GetIP()
    {
        if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if (strstr($ip, ',')) {
                $tmp = explode(',', $ip);
                $ip = trim($tmp[0]);
            }
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
        return $ip;
    }








}
