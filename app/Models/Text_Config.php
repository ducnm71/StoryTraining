<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Touch;

class Text_Config extends Model
{
    use HasFactory;
    protected $table = 'text_config';
    protected $fillable = ['touch_id', 'point_x', 'point_y'];

    public function text()
    {
        return $this->belongsTo(Touch::class, 'toucht_id', 'id');
    }

}
