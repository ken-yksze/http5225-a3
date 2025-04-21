<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            ['class_name' => 'Bollywood', 'class_time' => '2025-04-01 18:00:00', 'video_id' => 'rFnoK6iuBEw', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Locking Popping', 'class_time' => '2025-04-02 17:00:00', 'video_id' => '9_LMdshcq4c', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Funk', 'class_time' => '2025-04-03 19:00:00', 'video_id' => '6XXQ5AeOE7I', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Old School', 'class_time' => '2025-04-04 16:00:00', 'video_id' => 'gaf6iwsXqMA', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Lyrical', 'class_time' => '2025-04-05 18:00:00', 'video_id' => '9RqsikviXgk', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Robotics', 'class_time' => '2025-04-06 18:00:00', 'video_id' => 'vt1w3iCX1q8', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Contemp', 'class_time' => '2025-04-07 18:00:00', 'video_id' => 'PMzzY_xIywk', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Krump', 'class_time' => '2025-04-08 18:00:00', 'video_id' => 'y4jv5bk8ato', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Hiphop', 'class_time' => '2025-04-09 18:00:00', 'video_id' => '5hLX2dJG0QE', 'created_at' => '2025-04-03 05:35:57'],
            ['class_name' => 'Urban', 'class_time' => '2025-04-10 18:00:00', 'video_id' => 'F-MS0covhlU', 'created_at' => '2025-04-03 05:35:57'],
        ];
        foreach ($classes as $class) {
            DB::table('classes')->insert(array_merge($class, ['updated_at' => now()]));
        }
    }
}
