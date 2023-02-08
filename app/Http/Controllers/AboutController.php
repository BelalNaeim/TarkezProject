<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller {
    //
    public  function index () {
        $abouts = AboutUs::get();
        return view( 'main.about', compact( 'abouts' ) );
    }
}
