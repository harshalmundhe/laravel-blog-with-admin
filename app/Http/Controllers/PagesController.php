<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Index";
        return view("pages.index",compact('title'));
    }
    public function about(){
        $title = "About";
        return view("pages.about")->with("title",$title);
    }
    public function services(){
        $data = array(
            "title" => "Serives",
            "services" => ['Programming','Web Development','SEO']
        );
        return view("pages.services")->with($data);
    }
}
