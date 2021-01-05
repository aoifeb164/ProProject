<?php
# @Date:   2020-11-03T10:21:46+00:00
# @Last modified time: 2020-12-20T16:24:26+00:00




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
      $this->call(UserSeeder::class);
      $this->call(PublisherSeeder::class);
      $this->call(BookSeeder::class);
      $this->call(ReviewSeeder::class);
    }
}
