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
        'images/profiles/profile_01.jpg',
        'images/profiles/profile_02.jpg',
        'images/profiles/profile_03.jpg',
        'images/profiles/profile_04.jpg',
        'images/profiles/profile_05.jpg'

      ];
      foreach ($profiles as $profile){
        $photo = new Photo();
        $photo->caption = $faker->realText(20);
        $photo->filename = $images[array_rand($images)];
        $photo->profile_id = $profile->id;
        $photo->save();
        $profile->photo_id = $photo->id;
        $profile->save();
      }
    }
}
