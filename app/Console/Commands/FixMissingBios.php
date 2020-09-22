<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MyBB\Threads;
use App\Models\MyBB\Users as mUsers;
use App\Models\Sqlite\Users as bUsers;
use App\Models\Sqlite\Topics;
use App\Models\Sqlite\Posts as bPosts;
use App\Models\MyBB\Posts as mPosts;

class FixMissingBios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:bios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix the missing bios on migration';

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
        $missing = Threads::where('uid','=',0)
            ->where('username','=','')
            ->get();
        
        foreach($missing as $m) {
            dump($m->subject);
            $zb = Topics::where('topic','=',$m->subject)->first();
            dump($zb->id);
            $posts = bPosts::where('topic_id','=',$zb->id)->get();
            dump($posts->count());
            foreach($posts as $p) {
                $bUser = bUsers::where('id','=',$p->author)->first();
                dump($bUser->username);
                $mUser = mUsers::where('username','=',$bUser->username)->first();
                try {
                    dump($mUser->username);
                }
                catch(\Exception $e) {
                    $parts = explode(' ',$bUser->username);
                    $query = mUsers::select('*');
                    foreach($parts as $x) {
                        $query->orWhere('username','Like','%'.$x.'%');
                    }
                    $mUser = $query->first();
                    dump($mUser->username);
                }
                mPosts::create([
                    'tid' => $m->tid,
                    'replyto' => 0,
                    'fid' => 10,
                    'subject' => 'Re: '.$m->subject,
                    'icon' => 0,
                    'uid' => $mUser->uid,
                    'username' => $mUser->username,
                    'dateline' => strtotime($p->post_date),
                    'message' => $p->body,
                    'ipaddress' => '',
                    'includesig' => 1,
                    'smilieoff' => 0,
                    'edituid' => 0,
                    'edittime' => 0,
                    'editreason' => '',
                    'visible' => 1,
                ]);
            }
        }
    }
}
