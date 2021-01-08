<?php
# @Date:   2020-11-06T13:01:16+00:00
# @Last modified time: 2021-01-08T10:28:56+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sign;
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

    }
}
