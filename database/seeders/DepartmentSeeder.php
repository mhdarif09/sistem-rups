<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'IT Department'],
            ['name' => 'Human Resources'],
            ['name' => 'Finance'],
            // Tambahkan departemen lainnya sesuai kebutuhan
        ]);
    }
}
