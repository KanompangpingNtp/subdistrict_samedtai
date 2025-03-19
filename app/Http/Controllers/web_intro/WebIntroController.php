<?php

namespace App\Http\Controllers\web_intro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebIntro;

class WebIntroController extends Controller
{
    public function WebIntroPage()
    {
        $Image = WebIntro::all();
        $Button = WebIntro::first();

        return view('pages.festival_slides.pages',compact('Image','Button'));
    }
}
