<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the tasks table seeding.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'task' => 'Merapikan kamar tidur',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Menyapu dan mengepel lantai',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membersihkan kamar mandi',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membuang sampah ke luar rumah',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membeli beras',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membeli sabun mandi dan deterjen',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membeli sayur dan buah',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'task' => 'Membeli sampo dan pasta gigi',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
