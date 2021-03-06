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
        $this->call(PermissionSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);

        $this->call(CurrencySeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(CourseChapterSeeder::class);
        $this->call(ChapterQuizSeeder ::class);
        $this->call(CourseDoubtSeeder ::class);
        $this->call(PartnerCourseSeeder ::class);
    }
}
