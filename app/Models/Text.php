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

    public static function getText($text_id){
        return DB::table('text')->where('id', $text_id)->first();
    }

    public static function createText($data){
        return self::create(['text'=> $data['text']]);
    }

    public static function updateText($text_id, $data){
        $text = DB::table('text')->where('id', $text_id)->first();
        if(!$text){
            return false;
        }

        DB::table('text')->where('id', $text_id)->update($data);
        return true;
    }

    public static function deleteText($text_id){
        $text = DB::table('text')->where('id', $text_id)->first();
        if(!$text){
            return false;
        }

        DB::table('text')->where('id', $text_id)->delete();
        return true;
    }
}
