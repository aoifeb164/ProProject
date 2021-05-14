<?php
# @Date:   2020-11-06T13:54:28+00:00
# @Last modified time: 2021-03-09T12:38:20+00:00




namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Gender;
use App\Models\Sign;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'bio' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'date_format:Y-m-d'],
            'location' => ['required', 'string', 'max:50'],
            'gender_id' => 'required',
            'sign_id' => 'required',

            'genders' => 'required',
            'signs' => 'required'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      $images = [
        'images/profiles/profile_01.jpg',
        'images/profiles/profile_02.jpg',
        'images/profiles/profile_03.jpg',
        'images/profiles/profile_04.jpg',
        'images/profiles/profile_05.jpg'

      ];

            $faker = \Faker\Factory::create();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());

        $profile = Profile::create([
            'bio' => $data['bio'],
            'dob' => $data['dob'],
            'location' => $data['location'],
            'user_id' => $user->id,
            'gender_id' => $data['gender_id'],
            'sign_id' => $data['gender_id'],
            'photo_id'=>null
        ]);

        $photo = new Photo();
        $photo->caption = $faker->realText(20);
        $photo->filename = $images[array_rand($images)];
        $photo->profile_id = $profile->id;
        $photo->save();
        $profile->photo_id = $photo->id;
        $profile->save();

        $genders=$data['genders'];
        foreach ($genders as $gender){
          $profile->genders()->attach($gender);
        }

        $signs=$data['signs'];
        foreach ($signs as $sign){
          $profile->signs()->attach($sign);
        }

        return $user;;

    }

    protected function showRegistrationForm()
    {
      $genders = Gender::all();
      $signs = Sign::all();
      return view ('auth.register', [
        'genders'=>$genders,
        'signs'=>$signs
      ]);
    }
}
