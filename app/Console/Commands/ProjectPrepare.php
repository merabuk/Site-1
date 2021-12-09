<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use PHPUnit\TextUI\XmlConfiguration\Constant;

class ProjectPrepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:prepare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this comand after "composer dump-autoload" for prepare project before work';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Start clear view cache.');
        $this->call('view:cache');
        $this->info('Start clear route cache.');
        $this->call('route:cache');
        $this->info('Start clear cache.');
        $this->call('cache:clear');
        $this->info('Start clear config cache.');
        $this->call('config:cache');
        $this->info('Start cache config.');
        $this->call('config:cache');
        $this->info('Search linked folders in public.');
        if (File::isDirectory(public_path('storage'))) {
            $this->info('Gotcha!!!');
            if (PHP_OS_FAMILY == 'Windows') {
                rmdir(public_path('storage'));
            } else {
                unlink(public_path('storage'));
            };
        } else {
            $this->info('Nothing found!');
        }
        $this->info('Create new storage link.');
        $this->call('storage:link');
        $this->info('Start clean storage.');
        $this->call('storage:clear');
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }

    /**
     * Get the symbolic links that are configured for the application.
     *
     * @return array
     */
    protected function links()
    {
        return $this->laravel['config']['filesystems.links'] ??
               [public_path('storage') => storage_path('app/public')];
    }
}
