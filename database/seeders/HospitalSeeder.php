<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->string('name');
        //     $table->string('address');
        //     $table->string('province');
        //     $table->string('city');
        //     $table->string('district');
        //     $table->string('sub_district');
        //     $table->decimal('lat',10,8);
        //     $table->decimal('lng',11,8);
        //     $table->string('phone');
        //     $table->string('email');
        //     $table->text('description');
        DB::table('hospital')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
