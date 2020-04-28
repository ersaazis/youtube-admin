<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetUrlController extends Controller
{
    public function url($id){
        $youtube=DB::table('youtube')->find($id);
        DB::table('youtube')->where('id',$id)->update(["view"=>$youtube->view+1]);
        return "
        if('$youtube->url' != document.URL){
            window.location.href = '$youtube->url';
        }
        ";
    }
    public function referer($id){
        $youtube=DB::table('youtube')->find($id);
        $referer=$youtube->referer;
        $referer=explode("\n",$referer);
        $ref=$referer[rand(0,count($referer)-1)];
        return redirect($ref);
    }
}
