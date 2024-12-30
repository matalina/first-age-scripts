<?php

namespace App\Http\Controllers;

use App\Models\MyBB\Threads;
use App\Models\MyBB\Users;

class StoryController extends Controller
{
    public function index($dir)
    {
        $query = Threads::where(function($query) {
            $query->where('parentlist','LIKE','1,%')
            ->orWhere('parentlist','LIKE','23,%');
        })
            ->where('sticky','!=',1)
            ->join('forums','threads.fid','=','forums.fid');

        if($dir == 'forward') {
            $query->orderBy('dateline','ASC');
        }
        else if($dir == 'reverse') {
            $query->orderBy('dateline','DESC');
        }
        else {
            $query->orderBy('dateline','ASC');
        }

        $threads = $query
            ->with(['participants','forum'])
            ->get();

        return view('story')->with('threads',$threads)
            ->with('title', 'The Full Story')
            ->with('dir', $dir);
    }

    public function show($user,$dir)
    {
        $u = Users::where('username', '=', str_replace('-',' ',$user))->first();


        $query = Threads::where(function($query) {
            $query->where('parentlist','LIKE','1,%')
            ->orWhere('parentlist','LIKE','23,%');
        })
            ->where('sticky','!=',1)
            ->join('forums','threads.fid','=','forums.fid');

        if($dir == 'forward') {
            $query->orderBy('dateline','ASC');
        }
        else if($dir == 'reverse') {
            $query->orderBy('dateline','DESC');
        }
        else {
            $query->orderBy('dateline','ASC');
        }

        $threads = $query
            ->with(['participants','forum'])
            ->get();

        $story = $threads->filter(function($t) use ($u) {
            $parts =  $t->participants->where('uid','=',$u->uid);

            return ! $parts->isEmpty();
        });

        return view('story')->with('threads',$story->all())
            ->with('title', $u->username.'\'s Story')
            ->with('dir', $dir);
    }
}
