<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurEdgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ourEdges = [
            [
                'title' => 'Driven By Innovations',
                'slug' => 'driven-by-innovations',
                'description' => '<p>With a steadfast commitment to operational excellence and superior service delivery, <strong>McAsia Foodtrade Corporation</strong> has consistently expanded its customer network across the nation. In 2017, the Company undertook a significant strategic investment in <strong>Enterprise Resource Planning (ERP)</strong> technology to enhance efficiency, transparency, and integration across all business processes. Furthermore, the establishment of the Cebu warehouse marked a pivotal step in strengthening the Company\'s logistical capabilities, ensuring timely and reliable service to clients throughout the Visayas and Mindanao regions.</p><p><br></p>',
                'content' => '<h3>Innovation and Infrastructure</h3><p><strong>McAsia Foodtrade Corporation</strong> recognizes that innovation and infrastructure are the cornerstones of sustainable growth. The Company continues to invest in modern technologies, process automation, and data-driven systems to optimize operations and uphold the highest standards of efficiency. Its state-of-the-art storage facilities and advanced logistics framework are designed to maintain product integrity and ensure uninterrupted supply chain performance. Through these ongoing initiatives, <strong>McAsia</strong> reaffirms its commitment to excellence, positioning itself as a trusted partner in the food distribution industry.</p><h3>Sustained Commitment</h3><p>Guided by its vision of becoming a leading and trusted partner in the food distribution sector, <strong>McAsia Foodtrade Corporation</strong> remains dedicated to sustainable growth, continuous improvement, and strategic innovation. By leveraging technology, strengthening partnerships, and maintaining uncompromising quality standards, the Company continues to expand its reach and uphold its reputation as a reliable provider of premium food products nationwide.&nbsp;</p>',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Committed To Quality And Safety',
                'slug' => 'committed-to-quality-and-safety',
                'description' => '<p>At <strong>McAsia Foodtrade Corporation</strong>, we place the utmost priority on food safety, quality, and customer satisfaction. Guided by our commitment to excellence, we ensure that every product delivered meets the highest industry standards from sourcing and production to storage and distribution.</p>',
                'content' => '<h3>Quality Assurance In Action</h3><p>Our dedicated Culinary and Quality Assurance Team operates with precision and integrity, implementing stringent quality control measures that exceed international food safety benchmarks. Each stage of our process is carefully monitored to maintain product integrity, freshness, and compliance with regulatory requirements.</p><h3>Continuous Improvement</h3><p><strong>McAsia Foodtrade Corporation</strong> upholds internationally recognized food safety and quality management systems. We cultivate a culture of continuous improvement by leveraging innovation, advanced technology, and global best practices to strengthen every aspect of our supply chain. This unwavering dedication to quality reinforces <strong>McAsia\'s</strong> reputation as a trusted and responsible partner in providing safe, high-quality food products nationwide.&nbsp;</p>',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Built on Reliable Facilities',
                'slug' => 'built-on-reliable-facilities',
                'description' => '<p>Committed to maintaining the highest standards of safety and quality, <strong>McAsia Foodtrade Corporation</strong> made a strategic investment in a state-of-the-art warehouse established in early 2022. The facility is designed to optimize storage capacity, streamline inventory management, and support efficient distribution operations. Equipped with advanced <strong>Warehouse Management System (WMS) technology</strong> and a fleet of dedicated delivery trucks, the warehouse ensures a seamless, reliable, and fully integrated supply chain, reinforcing <strong>McAsia\'s</strong> commitment to operational excellence and timely delivery across the nation.&nbsp;</p>',
                'content' => '<h3>Technology-Enabled Operations</h3><p>Leveraging technology and industry best practices, <strong>McAsia Foodtrade Corporation</strong> continuously enhances its logistics and supply chain operations. The integration of real-time inventory tracking, automated processes, and optimized delivery routes allows the company to maintain product integrity, reduce lead times, and respond swiftly to customer demands. This forward-looking approach ensures that <strong>McAsia</strong> not only meets but exceeds the expectations of its partners and clients, reinforcing its reputation as a reliable and innovative leader in food distribution nationwide.</p><h3>Dependable Delivery Standards</h3><p>Through these advanced systems and meticulous operational standards, <strong>McAsia</strong> ensures that every product reaches its destination safely, efficiently, and in optimal condition, reflecting the Company\'s unwavering commitment to quality, safety, and customer satisfaction.&nbsp;</p>',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Distribution Network',
                'slug' => 'distribution-network',
                'description' => '<p>Our distribution goes beyond simply delivering products. It is about building seamless connections with our partners and customers. We ensure timely and reliable delivery across the Philippines, serving retailers, supermarkets, restaurants, e-commerce platforms, and food service establishments. Through a strategically managed logistics network and advanced operational systems, we consistently uphold product integrity, efficiency, and the highest standards of service, reinforcing MCAsi\'s reputation as a trusted and dependable partner in the food distribution industry.</p>',
                'content' => '<h3>Technology-Powered Reach</h3><p>Leveraging cutting-edge logistics technology and a nationwide delivery network, <strong>McAsia Foodtrade Corporation</strong> ensures that every product reaches its destination safely, efficiently, and on schedule. Our real-time tracking systems, optimized delivery routes, and dedicated fleet allow us to respond swiftly to customer demands while maintaining the highest standards of product quality and safety. This integrated approach strengthens our supply chain and reinforces MCAsia\'s commitment to reliable service, operational excellence, and lasting partnerships across the country.&nbsp;</p>',
                'sort_order' => 4,
                'is_published' => true,
            ],
        ];

        foreach ($ourEdges as $ourEdge) {
            DB::table('our_edges')->updateOrInsert(['slug' => $ourEdge['slug']], $ourEdge);
        }
    }
}
