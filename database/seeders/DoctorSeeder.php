<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'first_name' => 'Doctor first name',
            'last_name' => 'Doctor last name',
            'email' => 'doctor@doctor.com',
            'nid' => '123456789',
            'password' => Hash::make('doctor'),
            'dob' => '2022-09-01',
            'reg_no' => '121212121212121212',
            'status' => '1',
            // 'latlong' => str_replace(array('(', ')'), '', '(32.58042303852647, 74.08041894435883)'),
        ]);
    }
}
