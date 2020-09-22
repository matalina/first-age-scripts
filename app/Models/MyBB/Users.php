<?php

namespace App\Models\MyBB;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $connection = 'mybb';
    protected $table = 'users';
    protected $guarded = ['uid'];
    protected $primaryKey = 'uid';
    public $timestamps = false;
    
    /*
    uid	int(10) unsigned Auto Increment	
    username	varchar(120) []	
    password	varchar(120) []	
    salt	varchar(10) []	
    loginkey	varchar(50) []	
    email	varchar(220) []	
    postnum	int(10) unsigned [0]	
    threadnum	int(10) unsigned [0]	
    avatar	varchar(200) []	
    avatardimensions	varchar(10) []	
    avatartype	varchar(10) [0]	
    usergroup	smallint(5) unsigned [0]	
    additionalgroups	varchar(200) []	
    displaygroup	smallint(5) unsigned [0]	
    usertitle	varchar(250) []	
    regdate	int(10) unsigned [0]	
    lastactive	int(10) unsigned [0]	
    lastvisit	int(10) unsigned [0]	
    lastpost	int(10) unsigned [0]	
    website	varchar(200) []	
    icq	varchar(10) []	
    yahoo	varchar(50) []	
    skype	varchar(75) []	
    google	varchar(75) []	
    birthday	varchar(15) []	
    birthdayprivacy	varchar(4) [all]	
    signature	text	
    allownotices	tinyint(1) [0]	
    hideemail	tinyint(1) [0]	
    subscriptionmethod	tinyint(1) [0]	
    invisible	tinyint(1) [0]	
    receivepms	tinyint(1) [0]	
    receivefrombuddy	tinyint(1) [0]	
    pmnotice	tinyint(1) [0]	
    pmnotify	tinyint(1) [0]	
    buddyrequestspm	tinyint(1) [1]	
    buddyrequestsauto	tinyint(1) [0]	
    threadmode	varchar(8) []	
    showimages	tinyint(1) [0]	
    showvideos	tinyint(1) [0]	
    showsigs	tinyint(1) [0]	
    showavatars	tinyint(1) [0]	
    showquickreply	tinyint(1) [0]	
    showredirect	tinyint(1) [0]	
    ppp	smallint(6) unsigned [0]	
    tpp	smallint(6) unsigned [0]	
    daysprune	smallint(6) unsigned [0]	
    dateformat	varchar(4) []	
    timeformat	varchar(4) []	
    timezone	varchar(5) []	
    dst	tinyint(1) [0]	
    dstcorrection	tinyint(1) [0]	
    buddylist	text	
    ignorelist	text	
    style	smallint(5) unsigned [0]	
    away	tinyint(1) [0]	
    awaydate	int(10) unsigned [0]	
    returndate	varchar(15) []	
    awayreason	varchar(200) []	
    pmfolders	text	
    notepad	text	
    referrer	int(10) unsigned [0]	
    referrals	int(10) unsigned [0]	
    reputation	int(11) [0]	
    regip	varbinary(16)	
    lastip	varbinary(16)	
    language	varchar(50) []	
    timeonline	int(10) unsigned [0]	
    showcodebuttons	tinyint(1) [1]	
    totalpms	int(10) unsigned [0]	
    unreadpms	int(10) unsigned [0]	
    warningpoints	int(3) unsigned [0]	
    moderateposts	tinyint(1) [0]	
    moderationtime	int(10) unsigned [0]	
    suspendposting	tinyint(1) [0]	
    suspensiontime	int(10) unsigned [0]	
    suspendsignature	tinyint(1) [0]	
    suspendsigtime	int(10) unsigned [0]	
    coppauser	tinyint(1) [0]	
    classicpostbit	tinyint(1) [0]	
    loginattempts	smallint(2) unsigned [0]	
    loginlockoutexpiry	int(10) unsigned [0]	
    usernotes	text	
    sourceeditor	tinyint(1) [0]	
    passwordconvert	text NULL	
    passwordconverttype	text NULL	
    passwordconvertsalt	text NULL	
    as_uid	int(11) [0]	
    as_share	int(1) [0]	
    as_shareuid	int(11) [0]	
    as_sec	int(1) [0]	
    as_privacy	int(1) [0]	
    as_buddyshare	int(1) [0]	
    as_secreason	text
    */
}
