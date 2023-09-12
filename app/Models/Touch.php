<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Text;

class Touch extends Model
{
    use HasFactory;
    protected $table = 'touch';
    protected $fillable = ['text_id', 'page_id', 'data'];
    protected $casts = [
        'data' => 'array'
   ];

   public function text()
    {
        return $this->belongsTo(Text::class, 'text_id', 'id');
    }
}
