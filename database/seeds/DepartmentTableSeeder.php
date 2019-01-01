<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = [
            [
                'accronym' => 'PreElem',
                'name' => 'Pre-Elementary'
            ],
            [
                'accronym' => 'Elem',
                'name' => 'Elementary'
            ],
            [
                'accronym' => 'JHS',
                'name' => 'Junior High School'
            ],
            [
                'accronym' => 'SHS',
                'name' => 'Senior High School'
            ],
            [
                'accronym' => 'CAST',
                'name' => 'College of Arts, Sciences & Technology'
            ],
            [
                'accronym' => 'CABM-B',
                'name' => 'College of Accountancy, Business & Mgt. - Business'
            ],
            [
                'accronym' => 'CABM-H',
                'name' => 'College of Accountancy, Business & Mgt. - Hospitality'
            ],
            [
                'accronym' => 'CCJ',
                'name' => 'College of Criminal Justice'
            ],
            [
                'accronym' => 'COE',
                'name' => 'College of Education'
            ],
            [
                'accronym' => 'CON',
                'name' => 'College of Nursing'
            ],
        ];

        foreach($depts as $dept) {
            \App\Department::create($dept);
        }
    }
}
