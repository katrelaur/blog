<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => env('DEFAULT_USER_NAME', 'User McUserFace'),
            'email' => env('DEFAULT_USER_EMAIL', 'email@email.email'),
            'password' => env('DEFAULT_USER_PASSWORD_HASH', Hash::make('password')),
        ]);

        $this->call(UserSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(TagSeeder::class);
        // \App\Models\User::factory(10)->create();


    }
}
