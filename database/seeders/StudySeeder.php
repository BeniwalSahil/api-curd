<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Study;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $study = collect([
            [
                'name' => 'Mathematics',
                'description' => 'The study of numbers, quantities, and shapes. Etc',
            ],
            [
                'name' => 'Physics',
                'description' => 'The study of matter, energy, and the fundamental forces of nature. Etc',
            ],
            [
                'name' => 'Chemistry',
                'description' => 'The study of substances, their properties, and how they interact. Etc',
            ],
        ]);

        $study->each(function ($item){
            Study::insert($item);
        });
        // Study::create([
        //     'name' => 'Computer Science',php
        //     'description' => ' The study of computers and computational systems. Etc',
        // ]);
    }
}
