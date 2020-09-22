<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyBB\Threads;
use App\Models\MyBB\Posts;
use App\Models\MyBB\Users;

class ApiController extends Controller
{
    public function index()
    {
        $characters = Threads::where('fid','=', 10)
            ->join('users','threads.uid','=','users.uid')
            ->where('visible','=',1)
            ->select('tid','subject','threads.uid','threads.username','dateline','avatar')
            ->orderBy('username','Asc')
            ->get();
        
        return response()->json($characters);
    }
    
    public function story($user_id)
    {
        $u = Users::where('uid', '=', $user_id)->first();
        $dir = 'forward';
        
        $query = Threads::where(function($query) {
            $query->where('parentlist','LIKE','1,%')
            ->orWhere('parentlist','LIKE','23,%');
        })
            ->where('sticky','!=',1)
            ->where('visible','=',1)
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
        
        $output = [];
        foreach($story->all() as $s) {
            $players = $s->participants->unique()->pluck('avatar','username');
            $forum = [
                $s->forum->fid => $s->forum->name
            ];
            
            $output[] = [
                'tid' => $s->tid,
                'subject' => $s->subject,
                'players' => $players->toArray(),
                'forum' => $forum,
                'dateline' => $s->dateline,
            ];
        }
        
        return response()->json($output);
    }
    
    public function posts($topic_id)
    {
        $posts = Posts::where('tid','=',$topic_id)
            ->where('visible','=',1)
            ->select('tid','pid','uid','username','dateline','message')
            ->with(['character'])
            ->orderBy('dateline','asc')
            ->get();
        
        return response()->json($posts);
    }
}
