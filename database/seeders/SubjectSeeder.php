<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::factory()->sequence(
            ['name' => 'Pemrograman Web Lanjutan'],
            ['name' => 'Pemrograman Web Dasar'],
            ['name' => 'Pemrograman Lanjutan'],
        )->count(3)->create();
    }
}