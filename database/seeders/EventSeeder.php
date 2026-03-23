<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event_name' => 'MAFBEX 2025',
                'event_description' => '<p>MAFBEX 2025 was held at the World Trade Center Manila, and McAsia Foodtrade Corporation was proud to be part of this exciting event. At our booth, we shared product samples, fun giveaways, and had the chance to meet with partners and food enthusiasts. It was a great way to show our quality products and connect with more people in the industry. Thank you to everyone who visited - we look forward to serving more flavors soon!</p>',
                'event_date' => '2025-08-01',
                'is_published' => true,
            ],
            [
                'event_name' => 'WOFEX lloilo 2025',
                'event_description' => '<p>McAsia Foodtrade Corporation brought bold flavors and kitchen excitement to WOFEX Iloilo 2025! We proudly joined the event to showcase our wide range of sauces, condiments, and Asian ingredients that bring authentic flavors to every kitchen. It was a great opportunity to connect with chefs, food entrepreneurs, and partners who share our passion for quality and taste. We\'re grateful to everyone who visited our booth and look forward to bringing more Asian flavors closer to you.</p>',
                'event_date' => '2025-08-01',
                'is_published' => true,
            ],
            [
                'event_name' => 'WOFEX Manila 2025',
                'event_description' => '<p>McAsia Foodtrade Corporation brought authentic Asian flavors to life at the recently concluded WOFEX Manila World Food Expo 2025, the country\'s biggest stage for food and beverage innovation. Visitors at our booth experienced the taste of Asia through free samples, live cooking demos, and exciting dishes prepared by celebrity chefs Nino Logarta, Ryan Siapian, and Tina Agregado, together with our valued principals. From sauces and condiments to specialty ingredients, we showcased how our products can make every kitchen adventure easier and more flavorful. It was a truly inspiring and delicious experience. Thank you for making this event a success - we look forward to sharing more flavors with you soon!</p><p>&nbsp;</p>',
                'event_date' => '2025-08-01',
                'is_published' => true,
            ],
            [
                'event_name' => 'WOFEX Visayas 2025',
                'event_description' => '<p>McAsia Foodtrade Corporation was honored to be part of WOFEX Visayas 2025! The event was a dynamic platform where we showcased our trusted line of sauces, condiments, and Asian specialties that bring authentic flavors to every kitchen. It was an exciting opportunity to connect with industry leaders, strengthen partnerships, and highlight our commitment to quality and innovation. With every event like WOFEX, McAsia continues to serve solutions that inspire chefs, home cooks, and food businesses alike. Thank you to everyone who visited and connected with us during the event.</p>',
                'event_date' => '2025-08-01',
                'is_published' => true,
            ],
            [
                'event_name' => 'WOFEX Davao 2025',
                'event_description' => '<p>McAsia Foodtrade Corporation proudly joined WOFEX Mindanao, one of Mindanao\'s biggest food and beverage gatherings. The event was a flavorful stage for us to showcase our trusted range of Asian products that make every dish more delicious and convenient. We were delighted to meet industry partners, chefs, and food lovers who share the same passion for quality and taste. As we continue our journey, we are slowly bringing the home of Asian cravings to Davao - thank you to everyone who visited and shared this experience with us!</p>',
                'event_date' => null,
                'is_published' => true,
            ],
            [
                'event_name' => 'WOFEX Manila 2023',
                'event_description' => '<p>McAsia\'s booth at the World Food Expo last August 2-5, 2023 at the SMX Convention Center Manila, was a symphony of flavors and aromas, designed to captivate the palates of visitors. From the moment attendees stepped into our space, they were enveloped in an ambiance that celebrated the artistry and passion behind our culinary creations.</p>',
                'event_date' => '2025-08-06',
                'is_published' => true,
            ],
            [
                'event_name' => 'MAFBEX 2023',
                'event_description' => '<p>The Manila Food Expo happened last June 14-18, 2023 in World Trade Center, Manila provided a platform for us to explore and embrace regional culinary trends. From unique street food creations to innovative fusion dishes,</p>',
                'event_date' => '2023-06-19',
                'is_published' => true,
            ],
            [
                'event_name' => 'Thailand Week 2023',
                'event_description' => null,
                'event_date' => '2023-06-19',
                'is_published' => true,
            ],
            [
                'event_name' => 'Noel Bazaar 2022',
                'event_description' => '<p>As the holiday season unfolded, our team had the pleasure of participating in the much-anticipated Christmas Bazaar of 2022, Noel Bazaar - an event that transformed the ordinary into the extraordinary and spread festive cheer throughout the community. McAsias booth, adorned with twinkling lights and exuding a warm and welcoming ambiance, became a haven for holiday shoppers seeking unique gifts and delightful Asian products Our participation in the Christmas Bazaar allowed us to present exclusive holiday offerings that resonated with the festive spirit We want to send thanks to all who participated with us last November and December event dates that happened at Filinvest Tent, Alabang and World Trade Center</p>',
                'event_date' => null,
                'is_published' => true,
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->updateOrInsert([
                'event_name' => $event['event_name'],
                'event_date' => $event['event_date']
            ], $event);
        }
    }
}
