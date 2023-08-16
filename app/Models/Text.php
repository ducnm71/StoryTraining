<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Text extends Model
{
    use HasFactory;
    protected $table = 'text';
    protected $fillable = ['text'];

}
