<?php

namespace App\Models\Sqlite;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $connection = 'bios';
    protected $table = 'members';
    protected $guarded = ['id'];
}
