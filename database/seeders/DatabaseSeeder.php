<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
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
        User::factory(100)
        ->has(Blog::factory(3))
        ->create();
        Blog::factory(50)->create();
        Category::factory(50)->create();
        
        
    }
}
