<?php
# @Date:   2020-11-06T13:01:16+00:00
# @Last modified time: 2021-03-09T16:38:13+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;
class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $male = new Gender();
        $male->title ='male';
        $male->save();

        $female = new Gender();
        $female->title ='female';
        $female->save();

        $nonBinary = new Gender();
        $nonBinary->title ='nonBinary';
        $nonBinary->save();

        $genderNeutral = new Gender();
        $genderNeutral->title ='genderNeutral';
        $genderNeutral->save();

    }
}
