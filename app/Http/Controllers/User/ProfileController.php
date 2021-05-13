<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-05-13T18:22:54+01:00




namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function show()
    {
      $user = Auth::user();
      $profile = $user->profile;
      return view('user.profiles.show', [
      'profile' => $profile
      ]);
    }

    public function display($id)
    {
      $profile = Profile::findOrFail($id);
      return view('user.profiles.home.show', [
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
    public function edit()
    {
      //find the profile by id
      $user = Auth::user();
      $profile = $user->profile;
      $genders = Gender::all();
      $signs = Sign::all();
      return view('user.profiles.edit', [
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
    public function update(Request $request)
    {
      $user = Auth::user();
      $profile = $user->profile;
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


      return redirect()->route('user.profiles.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a profile get them by id in the profiles table and redirect back to profile index page
    public function destroy(Request $request)
    {
      $user = Auth::user();
      $profile = $user->profile;
      $profile->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Profile deleted successfully!');
        return redirect()->route('welcome');
    }
}
