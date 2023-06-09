<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
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
        Article::factory( )->count(20)->create();
        Category::factory( )->count(20)->create();
        Comment::factory( )->count(20)->create();
        User::factory( )->create(
            [
                "name"  =>  "Alice",
                "email" =>  "alice@gmail.com",
            ]
        );
        User::factory( )->create(
            [
                "name"  =>  "Bob",
                "email" =>  "bob@gmail.com",
            ]
        );
        User::factory( )->create(
            [
                "name"  =>  "Yoon",
                "email" =>  "yoon@gmail.com",
            ]
        );
      
    }
}
