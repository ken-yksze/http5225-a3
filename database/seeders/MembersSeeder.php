<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name' => 'Aarav Patel', 'email' => 'aarav.patel@example.com', 'role' => 'Student', 'image' => '1.jpg', 'class_id' => 1, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Vihaan Sharma', 'email' => 'vihaan.sharma@example.com', 'role' => 'Student', 'image' => '2.jpg', 'class_id' => 2, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Isha Gupta', 'email' => 'isha.gupta@example.com', 'role' => 'Student', 'image' => '3.jpg', 'class_id' => 3, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Aanya Kapoor', 'email' => 'aanya.kapoor@example.com', 'role' => 'Student', 'image' => '4.jpg', 'class_id' => 4, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Arjun Reddy', 'email' => 'arjun.reddy@example.com', 'role' => 'Student', 'image' => '5.jpg', 'class_id' => 5, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Maya Rao', 'email' => 'maya.rao@example.com', 'role' => 'Student', 'image' => '6.jpg', 'class_id' => 6, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Reyansh Singh', 'email' => 'reyansh.singh@example.com', 'role' => 'Student', 'image' => '7.jpg', 'class_id' => 7, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Saanvi Joshi', 'email' => 'saanvi.joshi@example.com', 'role' => 'Student', 'image' => '8.jpg', 'class_id' => 8, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Vivaan Mehta', 'email' => 'vivaan.mehta@example.com', 'role' => 'Student', 'image' => '9.jpg', 'class_id' => 9, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Kavya Nair', 'email' => 'kavya.nair@example.com', 'role' => 'Student', 'image' => '10.jpg', 'class_id' => 10, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Sagar Bora', 'email' => 'Sagarbora@gmail.com', 'role' => 'Instructor', 'image' => 'i1.jpg', 'class_id' => 9, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Suresh Mukund', 'email' => 'suresh@gmail.com', 'role' => 'Instructor', 'image' => 'i2.jpg', 'class_id' => 8, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Sanket Panchal', 'email' => 'sp@gmail.com', 'role' => 'Instructor', 'image' => 'i3.jpg', 'class_id' => 10, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Dharmesh yelande', 'email' => 'dyelande@gmail.com', 'role' => 'Instructor', 'image' => 'i4.jpg', 'class_id' => 5, 'created_at' => '2025-04-03 05:35:56'],
            ['name' => 'Karishma Patel', 'email' => 'karishmapatel273@gmail.com', 'role' => 'Instructor', 'image' => 'instructor1.jpeg', 'class_id' => 8, 'created_at' => '2025-04-03 05:38:43'],
        ];
        foreach ($members as $member) {
            DB::table('members')->insert(array_merge($member, ['updated_at' => now()]));
        }
    }
}
