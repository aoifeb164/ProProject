<?php
# @Date:   2020-11-06T14:07:54+00:00
# @Last modified time: 2021-02-10T14:55:37+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $profiles = Profile::all();
      return view('user.home', [
     'profiles' => $profiles
          ]);
    }
}
