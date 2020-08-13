<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class payment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'apid' => '',
            'amount' => 300,
            'status' => 'Pending',
            'created_at' => date(),
        ]);
    }
}
