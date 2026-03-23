<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ourStories = [
            [
                'title' => 'Our Story',
                'subtitle' => 'Bridging the Philippines with the authentic flavors of Asia since 2012',
                'description' => "<p><strong>McAsia Foodtrade Corporation</strong>, established in March 2012, began with a clear vision to bridge the Philippines with the rich flavors of Asia by providing authentic, high-quality food products to businesses and consumers nationwide. Operating under the trading name McAsia, the company set out to become a trusted source of Asian culinary essentials in the country.&nbsp;</p>",
                'content' => '<p><br></p><p><br></p>',
                'timeline_items' => '[{"body": "<p><strong>McAsia</strong> started as a direct importer of Japanese dry food items, supplying restaurants, hotels, and food institutions primarily within Metro Manila and parts of the Visayas. With its commitment to quality and reliability, the company quickly became a preferred partner for establishments seeking authentic Asian ingredients.&nbsp;</p>", "year": "2012", "title": "2012: The Beginning"}, {"body": "<p>Driven by growing demand, <strong>McAsia</strong> expanded its distribution nationwide in 2017. This milestone year also marked the company\'s investment in Enterprise Resource Planning (ERP) software, strengthening its operational capabilities and streamlining its processes. To better reach customers in the Visayas and Mindanao regions, <strong>McAsia</strong> established a dedicated warehouse in Cebu, further enhancing service efficiency and logistical reach.&nbsp;</p>", "year": "2017", "title": "2017: Expansion and Digital Transformation"}, {"body": "<p>In early 2022, <strong>McAsia</strong> elevated its supply chain operations with the development of a larger, fully equipped warehouse featuring expanded storage capacity. The implementation of a Warehouse Management System (WMS) enabled improved inventory control and faster fulfillment, ensuring that clients across the Philippines receive products efficiently and at optimal quality.&nbsp;</p>", "year": "2022", "title": "2022: Strengthening Infrastructure"}, {"body": "<p>From its humble beginnings, <strong>McAsia</strong> has grown into a comprehensive supplier of Asian food products, offering a diverse portfolio that includes dry goods, frozen items, alcoholic beverages, fresh produce, and everyday pantry staples. The company serves the market through food service establishments, retail channels such as supermarkets and grocery stores, and its own e-commerce platform, <strong>McAsia</strong> Mart.</p><p><strong>McAsia</strong> proudly acts as a vital link between international brands and the Philippine market. Partnering with well-known names such as Somi and Ozaki from Japan and Gaban from Malaysia, the company provides business-to-business (B2B) support to:</p><ul><li>Restaurants and hotels</li><li>Caterers and resorts</li><li>Supermarkets and grocery stores</li><li>E-Commerce platforms</li></ul><p>Through its unwavering commitment to authenticity, quality, and customer service, <strong>McAsia</strong> continues to deliver an ever-expanding range of Asian food options, helping bring the flavors of Asia to tables across the Philippines.&nbsp;</p>", "year": "Today", "title": "Today: A Trusted Nationwide Partner"}]',
                'is_published' => true,
            ]
        ];

        foreach ($ourStories as $ourStory) {
            DB::table('our_stories')->updateOrInsert(['title' => $ourStory['title']], $ourStory);
        }
    }
}
