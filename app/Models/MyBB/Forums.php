<?php

namespace App\Models\MyBB;

use Illuminate\Database\Eloquent\Model;

class Forums extends Model
{
    protected $connection = 'mybb';
    protected $table = 'forums';
    protected $guarded = ['fid'];
    protected $primaryKey = 'fid';
    public $timestamps = false;
    
    /*
    fid	smallint(5) unsigned Auto Increment	
    name	varchar(120) []	
    description	text	
    linkto	varchar(180) []	
    type	char(1) []	
    pid	smallint(5) unsigned [0]	
    parentlist	text	
    disporder	smallint(5) unsigned [0]	
    active	tinyint(1) [0]	
    open	tinyint(1) [0]	
    threads	int(10) unsigned [0]	
    posts	int(10) unsigned [0]	
    lastpost	int(10) unsigned [0]	
    lastposter	varchar(120) []	
    lastposteruid	int(10) unsigned [0]	
    lastposttid	int(10) unsigned [0]	
    lastpostsubject	varchar(120) []	
    allowhtml	tinyint(1) [0]	
    allowmycode	tinyint(1) [0]	
    allowsmilies	tinyint(1) [0]	
    allowimgcode	tinyint(1) [0]	
    allowvideocode	tinyint(1) [0]	
    allowpicons	tinyint(1) [0]	
    allowtratings	tinyint(1) [0]	
    usepostcounts	tinyint(1) [0]	
    usethreadcounts	tinyint(1) [0]	
    requireprefix	tinyint(1) [0]	
    password	varchar(50) []	
    showinjump	tinyint(1) [0]	
    style	smallint(5) unsigned [0]	
    overridestyle	tinyint(1) [0]	
    rulestype	tinyint(1) [0]	
    rulestitle	varchar(200) []	
    rules	text	
    unapprovedthreads	int(10) unsigned [0]	
    unapprovedposts	int(10) unsigned [0]	
    deletedthreads	int(10) unsigned [0]	
    deletedposts	int(10) unsigned [0]	
    defaultdatecut	smallint(4) unsigned [0]	
    defaultsortby	varchar(10) []	
    defaultsortorder	varchar(4) []
    */
    
}
