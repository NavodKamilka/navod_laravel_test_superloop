<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@gmail.com',
                'dob' => '1990-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@gmail.com',
                'dob' => '1985-05-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Brown',
                'email' => 'robert.brown@gmail.com',
                'dob' => '1992-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.davis@gmail.com',
                'dob' => '1988-08-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@gmail.com',
                'dob' => '1995-12-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Olivia',
                'last_name' => 'Wilson',
                'email' => 'olivia.wilson@gmail.com',
                'dob' => '1989-06-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Taylor',
                'email' => 'william.taylor@gmail.com',
                'dob' => '1983-11-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sophia',
                'last_name' => 'Anderson',
                'email' => 'sophia.anderson@gmail.com',
                'dob' => '1991-02-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Thomas',
                'email' => 'james.thomas@gmail.com',
                'dob' => '1993-07-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Charlotte',
                'last_name' => 'Lee',
                'email' => 'charlotte.lee@gmail.com',
                'dob' => '1987-03-14',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Henry',
                'last_name' => 'White',
                'email' => 'henry.white@gmail.com',
                'dob' => '1994-09-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Amelia',
                'last_name' => 'Harris',
                'email' => 'amelia.harris@gmail.com',
                'dob' => '1996-10-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Benjamin',
                'last_name' => 'Martin',
                'email' => 'benjamin.martin@gmail.com',
                'dob' => '1984-12-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Evelyn',
                'last_name' => 'Garcia',
                'email' => 'evelyn.garcia@gmail.com',
                'dob' => '1997-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Alexander',
                'last_name' => 'Clark',
                'email' => 'alexander.clark@gmail.com',
                'dob' => '1998-01-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
