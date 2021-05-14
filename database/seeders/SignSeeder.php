<?php
# @Date:   2020-11-06T13:01:16+00:00
# @Last modified time: 2021-03-09T17:39:50+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sign;
use App\Models\Compatability;
class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $signs = [
        'Aries', 'Taurus', 'Gemini', 'Cancer', 'Leo', 'Virgo', 'Libra', 'Scorpio', 'Sagittarius', 'Capricorn', 'Aquarius', 'Pisces'
      ];

      foreach ($signs as $s) {
        $sign = new Sign();
        $sign->title =$s;
        $sign->save();
      }

      $signs = Sign::all();
      foreach ($signs as $sign) {
        foreach ($signs as $sign2) {
          $c = new Compatability();
          $c->first_sign_id = $sign->id;
          $c->second_sign_id = $sign2->id;
          $c->weight = random_int(0,2);
          $c->save();
        }
      }
    }
}
