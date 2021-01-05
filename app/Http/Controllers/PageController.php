<?php
# @Date:   2020-11-16T11:39:45+00:00
# @Last modified time: 2020-11-16T11:40:51+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
return view('welcome');
    }
    public function about(){
return view('about');
    }
}
