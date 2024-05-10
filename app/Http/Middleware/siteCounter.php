<?php

namespace App\Http\Middleware;

use App\Http\Controllers\admin\tool\functionController;
use App\Models\blog_blog;
use App\Models\blog_blogIpHavuzu;
use App\Models\blog_siteIpHavuzu;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class siteCounter
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->getClientIp();

        if (request()->route()->getName() == "blogSingle") {
            $getUser = blog_blogIpHavuzu::where("ip", "=", $ip)->get();
            if (isset($getUser[0]["sonZiyaret"])) {

                if ($getUser[0]["sonZiyaret"] != date("Y-m-d")) {
                    // Blog Count
                    $blog = blog_blog::where("id", "=", $getUser[0]["blogId"])->get();
                    $readCount = $blog[0]["readCount"] + 1;
                    $arttir = ["readCount" => $readCount,];
                    $ziyaret = ["sonZiyaret" => date("Y-m-d"),];

                    blog_blog::where("id", "=", $blog[0]["id"])->update($arttir);
                    blog_blogIpHavuzu::where("id", "=", $getUser[0]["id"])->update($ziyaret);
                    // Blog Count

                    $getSiteUser = blog_siteIpHavuzu::where("ip", "=", $ip)->get();
                    if (isset($getSiteUser[0]["sonZiyaret"])) {
                        if ($getSiteUser[0]["sonZiyaret"] == date("Y-m-d")) {
                        } else {
                            $toplamZiyaret = $getSiteUser[0]["toplamZiyaret"] + 1;
                            $arttir = ["toplamZiyaret" => $toplamZiyaret];
                            blog_siteIpHavuzu::where("id", "=", $getSiteUser[0]["id"])->update($arttir);
                        }
                    } else {
                        $all = [
                            "ip" => $ip,
                            "sonZiyaret" => date("Y-m-d"),
                            "toplamZiyaret" => 1,
                        ];
                        blog_siteIpHavuzu::create($all);

                    }


                } else {

                    $getSiteUser = blog_siteIpHavuzu::where("ip", "=", $ip)->get();
                    if (isset($getSiteUser[0]["sonZiyaret"])) {
                        if ($getSiteUser[0]["sonZiyaret"] == date("Y-m-d")) {
                            return $next($request);
                        } else {
                            $toplamZiyaret = $getSiteUser[0]["toplamZiyaret"] + 1;
                            $arttir = ["toplamZiyaret" => $toplamZiyaret];
                            blog_siteIpHavuzu::where("id", "=", $getSiteUser[0]["id"])->update($arttir);

                        }
                    } else {
                        $all = [
                            "ip" => $ip,
                            "sonZiyaret" => date("Y-m-d"),
                            "toplamZiyaret" => 1,
                        ];
                        blog_siteIpHavuzu::create($all);

                    }
                }
            } else {
                $id = $request->id;
                $blog = blog_blog::where("id", "=", $id)->get();
                $readCount = $blog[0]["readCount"] + 1;
                $arttir = ["readCount" => $readCount,];
                $ziyaret = [
                    "ip" => $ip,
                    "sonZiyaret" => date("Y-m-d"),
                    "blogId" => $id,
                ];


                blog_blog::where("id", "=", $blog[0]["id"])->update($arttir);
                blog_blogIpHavuzu::create($ziyaret);
            }
        }else{
            $getSiteUser = blog_siteIpHavuzu::where("ip", "=", $ip)->get();
            if (isset($getSiteUser[0]["sonZiyaret"])) {
                if ($getSiteUser[0]["sonZiyaret"] == date("Y-m-d")) {
                    return $next($request);
                } else {
                    $toplamZiyaret = $getSiteUser[0]["toplamZiyaret"] + 1;
                    $arttir = ["toplamZiyaret" => $toplamZiyaret];
                    blog_siteIpHavuzu::where("id", "=", $getSiteUser[0]["id"])->update($arttir);
                }
            } else {
                $all = [
                    "ip" => $ip,
                    "sonZiyaret"=>date("Y-m-d"),
                    "toplamZiyaret" =>1,
                ];
                blog_siteIpHavuzu::create($all);

            }
        }
        return $next($request);


    }
}
