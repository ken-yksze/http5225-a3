<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessagesSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            ['name' => 'Aarav Patel', 'email' => 'aarav.patel@example.com', 'message' => 'Hello, I’m Aarav. I’m interested in joining the hip-hop classes. Can you provide more details?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Vihaan Sharma', 'email' => 'vihaan.sharma@example.com', 'message' => 'Hi, this is Vihaan. I’d like to know the schedule for the ballet classes. Thanks!', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Isha Gupta', 'email' => 'isha.gupta@example.com', 'message' => 'Greetings! I’m Isha. I’m curious about your contemporary dance workshops. Could you share more information?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Aanya Kapoor', 'email' => 'aanya.kapoor@example.com', 'message' => 'Hello from Aanya! I’m interested in the salsa classes. Can you tell me about the fees and timings?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Arjun Reddy', 'email' => 'arjun.reddy@example.com', 'message' => 'Hi, I’m Arjun. I’m looking for beginner’s classes in jazz dance. Please let me know the available options.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Maya Rao', 'email' => 'maya.rao@example.com', 'message' => 'Hey, Maya here! I’m interested in learning ballroom dance. Can you provide details on the classes?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Reyansh Singh', 'email' => 'reyansh.singh@example.com', 'message' => 'Hello, I’m Reyansh. I would like information on private dance lessons and their availability.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Saanvi Joshi', 'email' => 'saanvi.joshi@example.com', 'message' => 'Hi! Saanvi here. I’m looking for group dance classes for kids. Could you share more details?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Vivaan Mehta', 'email' => 'vivaan.mehta@example.com', 'message' => 'Greetings from Vivaan! I’d like to enroll in the advanced hip-hop class. Please provide the class schedule.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Kavya Nair', 'email' => 'kavya.nair@example.com', 'message' => 'Hello, this is Kavya. I’m interested in your dance fitness classes. Can you tell me about the timings and costs?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Aditya Desai', 'email' => 'aditya.desai@example.com', 'message' => 'Hi, I’m Aditya. I’m looking for adult ballet classes. Please let me know the class schedules.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Ananya Sharma', 'email' => 'ananya.sharma@example.com', 'message' => 'Hello from Ananya! I want to inquire about your dance competitions and events for kids.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Ishaan Agarwal', 'email' => 'ishaan.agarwal@example.com', 'message' => 'Hi there, Ishaan here. I’m interested in joining your breakdancing classes. Could you provide more information?', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Riya Choudhury', 'email' => 'riya.choudhury@example.com', 'message' => 'Greetings! I’m Riya. I’d like to know about your summer dance camps for children.', 'created_at' => '2025-04-03 03:53:42'],
            ['name' => 'Siddharth Patil', 'email' => 'siddharth.patil@example.com', 'message' => 'Hello, Siddharth here. I’m interested in learning traditional Indian dance forms. Please share the details of available classes.', 'created_at' => '2025-04-03 03:53:42'],
        ];
        foreach ($messages as $message) {
            DB::table('contact_messages')->insert(array_merge($message, ['updated_at' => now()]));
        }
    }
}
