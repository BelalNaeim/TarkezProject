<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleriesController extends Controller {
    //
    public  function index () {
        $galleries = Gallery::get();
        return view( 'main.gallery', compact( 'galleries' ) );
    }
}
