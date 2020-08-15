<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class appointment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment')->insert([
            'doc_id' => 64,
            'patient_id' => 65,
            'appointment' => date(),
            'symptoms' => 'Cold flue',
            'status' => 'Pending',
            'payment' => 'Done',
            'pid' => '',
        ]);
    }
}
