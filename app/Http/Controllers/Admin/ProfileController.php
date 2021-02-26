<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-01-27T15:57:25+00:00




namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
//calling the paient, user and insurance company models
use App\Models\Profile;
use App\Models\User;
use App\Models\InsuranceCompany;
use Request;
use DB;

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
      public function index()
      {
      $profiles = Profile::all();
      return view('admin.profiles.index', [
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
      //find the profile by id
      $profile = Profile::findOrFail($id);
      $insurance_companies = InsuranceCompany::all();
      return view('admin.profiles.edit', [
        'profile' => $profile,
        'insurance_companies' => $insurance_companies
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
        return redirect()->route('admin.profiles.index');
    }

    public function search(){
      $q = Request::input('q');
      $users = [];






      if($q != ' '){
        $users = DB::table('users')
      ->leftJoin('profiles','users.id','=','profiles.user_id')
      ->leftJoin('user_role','users.id','=','user_role.user_id')
      ->leftJoin('roles','roles.id','=','user_role.role_id')
      ->where('roles.name','user')
      ->get();

        $users = User::where('name', 'LIKE', '%' .$q . '%')
                                ->orWhere('email', 'LIKE', '%' .$q . '%')
                                ->get();



      }

      return view('welcome',[
        "users" => $users,
        "query" => $q
      ]);

    }
}
