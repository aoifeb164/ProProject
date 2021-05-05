<?php
# @Date:   2020-11-06T14:07:54+00:00
# @Last modified time: 2021-05-05T18:11:55+01:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Sign;
use App\Models\Compatability;
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
     //   $user = Auth::user();
     //  $profiles = Profile::all();
     //  return view('user.home', [
     // 'profiles' => $profiles,
     //
     //  ]);

      $profiles1 = DB::select(
      "SELECT DISTINCT p4.id
      FROM profile_sign ps1
      LEFT JOIN profiles p3 ON p3.id = ps1.profile_id
      LEFT JOIN signs s1 ON s1.id = ps1.sign_id
      LEFT JOIN profiles p4 ON p4.sign_id = s1.id
      WHERE p3.id = ".Auth::user()->profile->id."
      ORDER BY `p4`.`id` ASC");

      $profiles2 = DB::select(
      "SELECT DISTINCT p4.id
      FROM gender_profile gs1
      LEFT JOIN profiles p3 ON p3.id = gs1.profile_id
      LEFT JOIN genders g1 ON g1.id = gs1.gender_id
      LEFT JOIN profiles p4 ON p4.gender_id = g1.id
      WHERE p3.id = ".Auth::user()->profile->id."
      ORDER BY `p4`.`id` ASC");

      $ids1 = array_column($profiles1, 'id');
      $ids2 = array_column($profiles2, 'id');

      $ids = array_intersect($ids1, $ids2);
      $index = in_array(Auth::user()->profile->id, $ids);
      if ($index !== false) {
        unset($ids[$index]);
      }


      $matches = Profile::findMany($ids);

      $weights = array();
      $signs = Sign::all();
      $weights = Compatability::where('first_sign_id', Auth::user()->profile->sign->id)->get();
      $rankedMatches = $matches->sortByDesc(function ($profile, $index) use($weights) {
        return $weights->firstWhere('second_sign_id', $profile->sign_id)->weight;
      });
      //dd($rankedMatches);

      return view('user.home', [
       'profiles' => $rankedMatches
      ]);

}
}
