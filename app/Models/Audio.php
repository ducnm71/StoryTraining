<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audio';
    protected $fillable = ['text_id', 'file'];

    public static function getAudio($audio_id){
        return DB::table('audio')->where('id', $audio_id)->first();
    }

    public static function createAudio($text_id, $data){
        return self::create([
            'file' => $data['file'],
            'text_id' => $text_id
        ]);
    }

    public static function updateAudio($audio_id, $data){
        $audio = DB::table('audio')->where('id', $audio_id)->first();
        if(!$audio){
            return false;
        }

        DB::table('audio')->where('id', $audio_id)->update($data);
        return true;
    }

    public static function deleteAudio($audio_id){
        $audio = DB::table('audio')->where('id', $audio_id)->first();
        if(!$audio){
            return false;
        }

        DB::table('audio')->where('id', $audio_id)->delete();
        return true;
    }
}
