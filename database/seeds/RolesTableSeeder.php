<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User with administrative access'
            ],            
            [
                'name' => 'head',
                'display_name' => 'Department Head',
                'description' => 'Deans, Chairman, Principal'
            ],
            [
                'name' => 'registrar',
                'display_name' => 'School Registrar',
                'description' => 'Has access to school/student records and reports'
            ],
            [
                'name' => 'cashier',
                'display_name' => 'Cashier',
                'description' => 'Has access to billing transactions and reports'
            ],
            [
                'name' => 'osads',
                'display_name' => 'Office of Student Affairs and Development',
                'description' => 'Has Access to OSADS transactions'
            ],
            [
                'name' => 'guidance',
                'display_name' => 'Guidance Counsellor',
                'description' => 'Has access to guidance and counselling transactions & reports'
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Teacher',
                'description' => 'Has access to class based transactions and reports'
            ],
        ];

        foreach($roles as $role) {
            \App\Role::create($role);
        }

        $usr = \App\User::create([
            'username' => 'lentrix',
            'full_name' => 'Benjie B. Lenteria',
            'password' => bcrypt('password')
        ]);

        $usr->roles()->attach(1);
    }
}
