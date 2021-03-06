<?php

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
        // $this->call(UserSeeder::class);
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            StatusesTableSeeder::class,
            CategoriesTableSeeder::class,
            PersonalDetailsTableSeeder::class,
            InterestsTableSeeder::class,
            InterestLinksTableSeeder::class,
            DocumentsTableSeeder::class,
            DocumentLinksTableSeeder::class,
        ]);
    }
}
