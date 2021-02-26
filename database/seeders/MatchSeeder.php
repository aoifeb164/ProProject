<?php
# @Date:   2021-02-04T14:47:58+00:00
# @Last modified time: 2021-02-12T10:58:51+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
// use App\Models\Match;
class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      $numMatches = rand(10,20);
      $validStatus = ['pending', 'accepted', 'rejected'];
      for ($j = 0; $j != $numMatches; $j++){
        $profile_matcher = Profile::all()->random(1)->first();
        $profile_matchee = Profile::all()->random(1)->first();
        while ($profile_matcher->id === $profile_matchee->id){
          $profile_matchee = Profile::all()->random(1)->first();
        }
        $status = $validStatus[ array_rand($validStatus)];
        $profile_matcher->matches_sent()->attach($profile_matchee->id, ['status'=>$status]);
      }
    }
}
