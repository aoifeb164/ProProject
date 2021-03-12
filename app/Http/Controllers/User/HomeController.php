<?php
# @Date:   2020-11-06T14:07:54+00:00
# @Last modified time: 2021-03-09T12:10:27+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $user = Auth::user();
      $profiles = Profile::all();
      return view('user.home', [
     'profiles' => $profiles,
     
          ]);
        }
      //
      // $profiles = DB::SELECT DISTINCT p4.*
      // FROM profile_sign ps1
      // LEFT JOIN profiles p3 ON p3.id = ps1.profile_id
      // LEFT JOIN signs s1 ON s1.id = ps1.sign_id
      // LEFT JOIN profiles p4 ON p4.sign_id = s1.id
      // WHERE p3.id = 4
      // ORDER BY `p4`.`id` ASC
      // return view('user.home', [
      //  'profiles' => $profiles
      // ]);


}
