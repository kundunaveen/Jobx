<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function privacyPolicy(){
        return view('front-end.cms.privacy_policy');
    }

    public function aboutUs(){
        return view('front-end.cms.about_us');
    }

    public function termsConditions(){
        return view('front-end.cms.terms_conditions');
    }
}
