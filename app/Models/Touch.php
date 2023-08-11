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
    public static function getTouch($text_id){
        return DB::table('touch')->where('text_id', $text_id)->first();
    }

    public static function getAllTouch($page_id){
        $configs = DB::table('touch')->where('page_id', $page_id)->get();
        $text_ids =  $configs->pluck('text_id');
        return DB::table('text')->whereIn('id', $text_ids)->get();
    }

    // public static function getAllConfig(){
    //     $text_ids =  DB::table('text_config')->pluck('text_id');
    //     return DB::table('text')->whereIn('id', $text_ids)->get();
    // }

    public static function createTouch($page_id, $text_id, $data){
        return self::create([
            'page_id' => $page_id,
            'text_id' => $text_id,
            'data' => $data['data']
        ]);
    }

    public static function updateTouch($text_id, $data){
        $touch = DB::table('touch')->where('text_id', $text_id)->first();
        if(!$touch){
            return false;
        }
        DB::table('touch')->where('text_id', $text_id)->update($data);
        return true;
    }

    public static function deleteTouch($text_id){
        $touch = DB::table('touch')->where('text_id', $text_id)->first();
        if(!$touch){
            return false;
        }
        DB::table('touch')->where('text_id', $text_id)->delete();
        return true;
    }
}
