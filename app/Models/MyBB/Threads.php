<?php

namespace App\Models\MyBB;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyBB\Posts;
use App\Models\MyBB\Forums;
use App\Models\MyBB\Users;

class Threads extends Model
{
    protected $connection = 'mybb';
    protected $table = 'threads';
    protected $guarded = ['tid'];
    protected $primaryKey = 'tid';
    public $timestamps = false;
    
    public function posts() {
        return $this->hasMany(Posts::class,'tid','tid');
    }
    
    public function forum() {
        return $this->belongsTo(Forums::class,'fid','fid');
    }
    
    public function creator() {
        return $this->hasOne(Users::class,'uid','uid');
    }
    
    public function participants() {
        return $this->hasManyThrough(Users::class, Posts::class,'tid','uid','tid','uid');
    }
    
    /*
    tid	int(10) unsigned Auto Increment	
    fid	smallint(5) unsigned [0]	
    subject	varchar(120) []	
    prefix	smallint(5) unsigned [0]	
    icon	smallint(5) unsigned [0]	
    poll	int(10) unsigned [0]	
    uid	int(10) unsigned [0]	
    username	varchar(80) []	
    dateline	int(10) unsigned [0]	
    firstpost	int(10) unsigned [0]	
    lastpost	int(10) unsigned [0]	
    lastposter	varchar(120) []	
    lastposteruid	int(10) unsigned [0]	
    views	int(100) unsigned [0]	
    replies	int(100) unsigned [0]	
    closed	varchar(30) []	
    sticky	tinyint(1) [0]	
    numratings	smallint(5) unsigned [0]	
    totalratings	smallint(5) unsigned [0]	
    notes	text	
    visible	tinyint(1) [0]	
    unapprovedposts	int(10) unsigned [0]	
    deletedposts	int(10) unsigned [0]	
    attachmentcount	int(10) unsigned [0]	
    deletetime	int(10) unsigned [0]
    */
}
