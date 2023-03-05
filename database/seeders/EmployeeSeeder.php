<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'Idpel'=> '51803010027',
            'Nama'=> 'Samuel',
            'Alamat'=> 'Jl. Veteran No.1',
            'Daya'=> 'R1 900',
        ]);
    }
}
