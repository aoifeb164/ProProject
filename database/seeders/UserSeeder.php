<?php
# @Date:   2020-11-06T13:00:54+00:00
# @Last modified time: 2021-01-08T11:01:44+00:00


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use App\Models\Sign;
use App\Models\Gender;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $role_admin = Role::where('name','admin')->first();
        $role_user = Role::where('name','user')->first();

        $admin = new User();
        $admin->name = 'Aoife Brennan';
        $admin->email = 'aoife@email.com';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ronan Woods';
        $user->email = 'ronan@email.com';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $profile = new Profile();
        $profile->bio = $faker->paragraph(3);
        $profile->dob = $faker->date('Y-m-d', '2003-01-01');
        $profile->user_id = $user->id;
        $profile->gender_id = Gender::all()->random(1)->first()->id;
        $profile->sign_id = Sign::all()->random(1)->first()->id;
        $profile->photo_id = null;
        $profile->save();



        for ($i = 1; $i <=3; $i++) {
          $User = User::factory()->create();
          $admin->roles()->attach($role_admin);

        }
        for ($i = 1; $i <=15; $i++) {
          $User = User::factory()->create();
          $user->roles()->attach($role_user);

          $profile = new Profile();
          $profile->bio = $faker->paragraph(3);
          $profile->dob = $faker->date('Y-m-d', '2003-01-01');
          $profile->user_id = $user->id;
          $profile->gender_id = Gender::all()->random(1)->first()->id;
          $profile->sign_id = Sign::all()->random(1)->first()->id;
          $profile->photo_id = null;
          $profile->save();
        }

        // for ($i = 1; $i <=30; $i++) {
        //   $User = User::factory()->create();
        //   $user->roles()->attach($role_user);
        //   $customer = Customer::factory()->create([]
        //   'user_id' => $user->id,
        // ]);
        // }
    }
}
