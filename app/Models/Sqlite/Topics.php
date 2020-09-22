<?php

namespace App\Models\Sqlite;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    protected $connection = 'bios';
    protected $table = 'topics';
    protected $guarded = ['id'];
}
