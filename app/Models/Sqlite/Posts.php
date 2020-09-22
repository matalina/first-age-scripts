<?php

namespace App\Models\Sqlite;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $connection = 'bios';
    protected $table = 'posts';
    protected $guarded = ['id'];
}
