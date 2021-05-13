<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-02-04T10:36:44+00:00




namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Profile;
use App\Models\Sign;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
          $this->middleware('role:admin');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      //when requesting the index page display the profiles index and get all the profiles from the profiles table
      public function index(Request $request)
      {
      $profiles = Profile::all();
      $genders = Gender::all();
      $signs = sign::all();
      return view('admin.profiles.index', [
     'profiles' => $profiles,
     'genders' => $genders,
     'signs' => $signs,
     'request' => $request
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //when on the add profile page display the profiles create form page
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   //when storing a new profile the fields are validated by making sure they have entered data and inputed using correct information format
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting the show profile page display the profiles show page and get the profile by id from the profiles table
    public function show($id)
    {
      //find the profile by id
      $profile = Profile::findOrFail($id);
      return view('admin.profiles.show', [
        'profile' => $profile
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting to edit a profile display the profile edit page and get the profile by id from the profiles table
    public function edit($id)
    {
      $user = Auth::user();
      //find the profile by id
      $profile = Profile::findOrFail($id);
      $genders = Gender::all();
      $signs = Sign::all();
      return view('admin.profiles.edit', [
        'profile' => $profile,
        'genders' => $genders,
        'signs' => $signs
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when updating a new profile the fields are validated by making sure they have inputed and they are using correct information format
    public function update(Request $request, $id)
    {
      $user = Auth::user();
      $profile = Profile::findOrFail($id);


      $request->validate([
      'name' => 'required|max:191',
      'email' => 'required|max:191|unique:users,email,'.$profile->user_id,
      'bio' => 'required|max:191',
      'location' => 'required|max:191',
      'gender_id' => 'required|max:191',
      'sign_id' => 'required|max:191'

    ]);

    $profile->bio = $request->input('bio');
    $profile->location = $request->input('location');
    $profile->gender_id = $request->input('gender_id');
    $profile->sign_id = $request->input('sign_id');
    $profile->save();

    $user = User::findOrFail($profile->user_id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();


    return redirect()->route('admin.profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a profile get them by id in the profiles table and redirect back to profile index page
    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        $profile = Profile::findOrFail($id);
        $profile->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Profile deleted successfully!');
        return redirect()->route('admin.profiles.index');
    }


    public function search(Request $request){

        // dd($request);
        $q = $request->input('q');

        $gender_id = $request->input('gender_id');
        $sign_id = $request->input('sign_id');

          $query = DB::table('profiles')->select('profiles.id')
                                        ->leftJoin('users','users.id','=','profiles.user_id')
                                        ->leftJoin('user_role','users.id','=','user_role.user_id')
                                        ->leftJoin('roles','roles.id','=','user_role.role_id')
                                        ->where('roles.name','user');


        if($gender_id != "0"){
          $query = $query->where('profiles.gender_id', '=',  $gender_id );
        }
        if($sign_id != "0"){
          $query = $query->where('profiles.sign_id', '=',  $sign_id );
        }
        if($q != ""){
          $query = $query->where('users.name', 'LIKE', '%' .$q . '%')
                         ->orWhere('users.email', 'LIKE', '%' .$q . '%');
        }

        $profiles = $query->get();

        $ids = $profiles->map(function ($profile) {
          return $profile->id;
        });

        $profiles = Profile::find($ids);
        $genders = Gender::all();
        $signs = Sign::all();




        return view('admin.profiles.index',[
          "profiles" => $profiles,
          "q" => $q,
          'genders' => $genders,
          'signs' => $signs,
          'request' => $request
        ]);

    } //end of search function


}
