<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReachUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reachUs = [
            [
                'title' => 'Reach Us',
                'subtitle' => 'We are here to support your inquiries, partnerships, and business needs.',
                'description' => '<p>At <strong>McAsia Foodtrade Corporation</strong>, we value meaningful connections with our partners, clients, and customers. Whether you are a supplier looking to collaborate, a retailer interested in our brands, or a customer with an inquiry, our team is ready to assist you.<br><br>We believe that open communication is key to lasting partnerships. Our dedicated representatives are here to provide support, answer your questions, and explore opportunities that align with your business needs.<br><br>Let us build something great together. Reach us today.</p>',
                'is_published' => true,
            ]
        ];

        foreach ($reachUs as $data) {
            DB::table('reach_us')->updateOrInsert(['title' => $data['title']], $data);
        }
    }
}
