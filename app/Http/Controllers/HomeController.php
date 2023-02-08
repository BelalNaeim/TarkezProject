<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class HomeController extends Controller {
    //
    public  function index () {
        $mains = Main::get();
        return view( 'main.home', compact( 'mains' ) );
    }
}
