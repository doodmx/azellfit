<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Interfaces\Blog\BlogInterface;

class PublishPosts extends Command
{

    private $blogs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BlogInterface $blogContract)
    {
        parent::__construct();
        $this->blogs = $blogContract;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $currentDate = Carbon::now();
        $this->blogs->publishPostsFromDate($currentDate->format('Y-m-d'), $currentDate->format('H:i:s'));

    }
}
