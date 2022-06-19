<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 500; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('identities')->insert([
                'idNumber' => $faker->nik(),
                'fullname' => $faker->name($gender),
                'gender' => $gender,
                'IDType' => $faker->optional(0.05, 'KTP')->randomElement(['KTP', 'Passport']),
                'address' => $faker->address(),
                'religion' => $faker->optional(0.13, 'Islam')->randomElement(['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'maritalStatus' => $faker->optional(0.95, 'divorcee')->randomElement(['single', 'married', 'divorcee']),
                'pob' => $faker->city(),
                'dob' => $faker->date(),
                'created_at' => now(),
            ]);
        }
    }
}
