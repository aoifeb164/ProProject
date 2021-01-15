<?php
# @Date:   2021-01-15T09:53:07+00:00
# @Last modified time: 2021-01-15T10:55:48+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Profile;
class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = \Faker\Factory::create();

      $profiles = Profile::all();

      $images = [
        'images/profiles/profile_01.png',
        'images/profiles/profile_02.png',
        'images/profiles/profile_03.png',
        'images/profiles/profile_04.png',
        'images/profiles/profile_05.png',
          'images/profiles/profile_06.png',
          'images/profiles/profile_07.png',
          'images/profiles/profile_08.png',
          'images/profiles/profile_09.png',
          'images/profiles/profile_10.png',
            'images/profiles/profile_11.png',
            'images/profiles/profile_12.png',
            'images/profiles/profile_13.png',
            'images/profiles/profile_14.png',
            'images/profiles/profile_15.png',
            'images/profiles/profile_16.png'

      ];
      $i = 0;
      foreach ($profiles as $profile){
        $photo = new Photo();
        $photo->caption = $faker->realText(20);
        $photo->filename = $images[$i];
        $photo->profile_id = $profile->id;
        $photo->save();
        $profile->photo_id = $photo->id;
        $profile->save();
        $i++;
      }
    }
}
