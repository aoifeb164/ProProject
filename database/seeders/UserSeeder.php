<?php
# @Date:   2020-11-06T13:00:54+00:00
# @Last modified time: 2021-05-14T13:28:35+01:00


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


        for ($i = 1; $i <=100; $i++) {
          $genders = Gender::all();
          $totalNumGenders = $genders->count();
          $signs = Sign::all();
          $totalNumSigns = $signs->count();
          $user = User::factory()->create();
          $user->roles()->attach($role_user);

          $profile = new Profile();
          $profile->bio = $faker->paragraph(3);
          $profile->dob = $faker->date('Y-m-d', '2003-01-01');
          $profile->location = 'Dublin';
          $profile->user_id = $user->id;
          $profile->gender_id = $genders->random(1)->first()->id;
          $profile->sign_id = $signs->random(1)->first()->id;
          $profile->photo_id = null;
          $profile->save();

          $numSigns = random_int(1, $totalNumSigns/3);
          for($j = 0; $j != $numSigns; $j++){
            $signs = $signs->shuffle();
            $sign = $signs->pop();
            $profile->signs()->attach($sign->id);
          }
          $numGenders = random_int(1, $totalNumGenders/2);
          for($j = 0; $j != $numGenders; $j++){
            $genders = $genders->shuffle();
            $gender = $genders->pop();
            $profile->genders()->attach($gender->id);
          }
        }

    }
}
