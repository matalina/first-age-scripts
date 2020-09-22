<?php

namespace App\Models\MyBB;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $connection = 'mybb';
    protected $table = 'posts';
    protected $guarded = ['pid'];
    protected $primaryKey = 'pid';
    public $timestamps = false;
    
    public function character() 
    {
        return $this->belongsTo(Users::class,'uid','uid')->select('uid','username','avatar');
    }
    
    /*
    pid	int(10) unsigned Auto Increment	
    tid	int(10) unsigned [0]	
    replyto	int(10) unsigned [0]	
    fid	smallint(5) unsigned [0]	
    subject	varchar(120) []	
    icon	smallint(5) unsigned [0]	
    uid	int(10) unsigned [0]	
    username	varchar(80) []	
    dateline	int(10) unsigned [0]	
    message	text	
    ipaddress	varbinary(16)	
    includesig	tinyint(1) [0]	
    smilieoff	tinyint(1) [0]	
    edituid	int(10) unsigned [0]	
    edittime	int(10) unsigned [0]	
    editreason	varchar(150) []	
    visible	tinyint(1) [0]
    */
}
