<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            'fname' => 'Alice',
            'sname' => 'Smith',
            'jobTitle' => 'Admin',
            'department' => 'Technical Support',
            'telephone' => '079123456789',
        ]);
    }
}
