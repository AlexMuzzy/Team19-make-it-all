<?php

use Illuminate\Database\Seeder;

class CasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cases')->insert([
            'employeeID' => 0,
            'fname' => str_random(5),
            'sname' => str_random(5),
            'category' => 'Hardware',
            'issue' => 'Screen',
            'priority' => 'Low',
            'summary' => str_random(10),
            'solvedtext' => ''
        ]);
    }
}
