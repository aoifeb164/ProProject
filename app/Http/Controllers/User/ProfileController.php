<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-02-04T16:24:58+00:00




namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//calling the paient, user and insurance company models
use App\Models\Profile;
use App\Models\Sign;
use App\Models\Gender;
use App\Models\User;

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
          $this->middleware('role:user');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      //when requesting the index page display the profiles index and get all the profiles from the profiles table
      public function index()
      {
      $profiles = Profile::all();
      return view('user.profiles.index', [
     'profiles' => $profiles
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
      $users = User::all();

      $genders = Gender::all();
        return view('admin.patients.create', [
        'users'=> $users,
        'genders' => $genders
      ]);
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
      return view('user.profiles.show', [
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
      //find the profile by id
      $profile = Profile::findOrFail($id);
      $genders = Gender::all();
      $signs = Sign::all();
      return view('user.profiles.edit', [
        'profile' => $profile,
        'gender_id' => $genders,
        'sign_id' => $signs
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
        $profile = Profile::findOrFail($id);
        $profile->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Profile deleted successfully!');
        return redirect()->route('user.profiles.index');
    }
}
