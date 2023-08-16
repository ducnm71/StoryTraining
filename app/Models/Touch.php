<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Touch extends Model
{
    use HasFactory;
    protected $table = 'touch';
    protected $fillable = ['text_id', 'page_id', 'data'];
    protected $casts = [
        'data' => 'array'
   ];
}
