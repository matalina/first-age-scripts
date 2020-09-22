<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MyBB\Posts;

class FixInternalLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert zetaboard links to new links';

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
     * @return mixed
     */
    public function handle()
    {
        $posts = Posts::where('message','LIKE','%http://w11.zetaboards.com/TheFirstAge/%')->get();
        dump($posts->count());
        foreach($posts as $p) {
            preg_match_all('#\[url=(http:\/\/w11.zetaboards.com\/TheFirstAge\/.+?)\]#', $p->message, $matches);
            dump($matches);
        }
    }
}
