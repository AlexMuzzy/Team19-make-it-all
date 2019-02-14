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
            'fname' => str_random(5),
            'sname' => str_random(5),
            'category' => 'hardware',
            'issue' => 'Screen',
            'priority' => 'low',
            'description' => str_random(160)
        ]);
    }
}
