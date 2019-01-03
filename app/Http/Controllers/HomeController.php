<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 01.01.19
 * Time: 21:20
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

}