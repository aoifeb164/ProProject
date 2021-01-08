<?php
# @Date:   2020-11-06T13:01:16+00:00
# @Last modified time: 2021-01-08T10:24:32+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Relationship;
class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $friend = new Relationship();
        $friend->title ='friend';
        $friend->save();

        $lover = new Relationship();
        $lover->title ='lover';
        $lover->save();

        $casual = new Relationship();
        $casual->title ='casual';
        $casual->save();

    }
}
