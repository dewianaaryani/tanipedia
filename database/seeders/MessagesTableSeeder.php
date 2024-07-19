<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'email' => 'john.doe@example.com',
                'message' => 'Hello, I have a question about your agricultural products. Can you please provide more information?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'jane.smith@example.com',
                'message' => 'Good day! I am interested in learning more about your organic farming practices. Could you share some details?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'mark.jones@example.com',
                'message' => 'Hi there, I would like to inquire about your delivery options for seeds to rural areas. Thank you!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'sarah.brown@example.com',
                'message' => 'Greetings! How do I sign up for your upcoming agricultural workshop? Looking forward to your response.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'michael.nguyen@example.com',
                'message' => 'Hello team, I have a suggestion for improving your online ordering process. Let me know if you would like to hear it.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('messages')->insert($messages);
    }
}
