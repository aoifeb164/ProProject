<?php
# @Date:   2020-11-03T10:21:46+00:00
# @Last modified time: 2021-01-08T10:51:16+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleSeeder::class);
      $this->call(GenderSeeder::class);
      $this->call(RelationshipSeeder::class);
      $this->call(SignSeeder::class);
      $this->call(UserSeeder::class);
    }
}
