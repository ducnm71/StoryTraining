<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Story extends Model
{
    use HasFactory;
    protected $table = 'story';
    protected $fillable = ['name', 'type','thumbnail', 'author'];

}
