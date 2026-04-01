<?php

namespace App\Console\Commands;

use App\Services\CrawlSeoService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap for the application.';

    /**
     * Execute the console command.
     */
    public function handle(CrawlSeoService $crawl): void
    {
        $loading = $this->output->createProgressBar(1);

        $loading->start();
        $crawl();
        $loading->advance();
        $loading->finish();

        $this->newLine();
        $this->info('Sitemap generated successfully');
    }
}
