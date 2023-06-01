<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;

class CrawlController extends Controller
{
    public function CrawlPostJob(){
        $arrayLinks = [];
        for ($i=1; $i <= 3; $i++) { 
            $crawler = GoutteFacade::request('GET', 'https://vieclam24h.vn/tim-kiem-viec-lam-nhanh?page='.$i);
            $Links = $crawler->filter('div.rounded-sm a')->each(function ($node) {
                return $node->attr("href");
            });
            array_push($arrayLinks, $Links);
        }
        // dd($arrayLink);
        $dataMain = [];
        if ( !empty($arrayLinks) ) {
            foreach ($arrayLinks as $key => $arrayLink) {
                if ( !empty($arrayLink)) {
                    foreach ($arrayLink as $key => $itemLink) {
                        $content = GoutteFacade::request('GET', 'https://vieclam24h.vn/ban-buon-ban-le-quan-ly-cua-hang/nhan-vien-telesales-thu-nhap-20-30tr-c6p73id200223028.html');
                        $nameCompany = $content->filter('div.px-4 a h3')->each(function ($node) {
                            return $node->text();
                        });
                        $reviewCompany = $content->filter('div.text-se-neutral-84')->each(function ($node) {
                            return $node->text();
                        });
                        $main = $content->filter('main')->each(function ($node) {
                            return $node->text();
                        });
                    }
                    dd($nameCompany, $reviewCompany, $main);
                }
            }
        }
       
    }
}
