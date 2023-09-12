<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Text;

class Text_Config extends Model
{
    use HasFactory;
    protected $table = 'text_config';
    protected $fillable = ['text_id', 'page_id', 'point_x', 'point_y'];

    public function text()
    {
        return $this->belongsTo(Text::class, 'text_id', 'id');
    }

}
