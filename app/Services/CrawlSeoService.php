<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Product;
use App\Models\PublicPage\OurEdge;
use App\Models\PublicPage\Recipe;
use App\Models\SalesAvenue;
use Spatie\Sitemap\SitemapGenerator;

class CrawlSeoService
{
    public function __invoke()
    {
        SitemapGenerator::create(config('app.url'))
            ->getSitemap()
            ->add(Brand::query()->get())
            ->add(Recipe::query()->get())
            ->add(OurEdge::query()->get())
            ->add(SalesAvenue::query()->get())
            ->add(Product::query()->get())
            ->add(route('our-story'))
            ->add(route('news_event'))
            ->add(route('reach-us'))
            ->add(route('our_channel'))
            ->add(route('our_impact'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
