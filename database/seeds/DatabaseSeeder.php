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
        // $this->call(UsersTableSeeder::class);
        //factory(App\User::class, 3)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);

    }
}
