<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Text_Config extends Model
{
    use HasFactory;
    protected $table = 'text_config';
    protected $fillable = ['text_id', 'page_id', 'point_x', 'point_y'];

}
