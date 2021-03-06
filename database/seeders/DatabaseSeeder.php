<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      (new PostTableSeeder)->run();
      (new CommentTableSeeder)->run();
      (new UserTableSeeder)->run();
    }
}
