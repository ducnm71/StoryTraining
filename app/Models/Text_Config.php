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

    public static function getTextConfig($text_id){
        return DB::table('text_config')->where('text_id', $text_id)->first();
    }

    public static function getAllConfig($page_id){
        $configs = DB::table('text_config')->where('page_id', $page_id)->get();
        $text_ids =  $configs->pluck('text_id');
        return DB::table('text')->whereIn('id', $text_ids)->get();
    }

    // public static function getAllConfig(){
    //     $text_ids =  DB::table('text_config')->pluck('text_id');
    //     return DB::table('text')->whereIn('id', $text_ids)->get();
    // }

    public static function configText($page_id, $text_id, $data){
        return self::create([
            'page_id' => $page_id,
            'text_id' => $text_id,
            'point_x' => $data['point_x'],
            'point_y' => $data['point_y']
        ]);
    }

    public static function updateTextConfig($text_id, $data){
        $text_config = DB::table('text_config')->where('text_id', $text_id)->first();
        if(!$text_config){
            return false;
        }
        DB::table('text_config')->where('text_id', $text_id)->update($data);
        return true;
    }

    public static function deleteTextConfig($text_id){
        $text_config = DB::table('text_config')->where('text_id', $text_id)->first();
        if(!$text_config){
            return false;
        }
        DB::table('text_config')->where('text_id', $text_id)->delete();
        return true;
    }
}
