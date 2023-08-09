<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Story extends Model
{
    use HasFactory;
    protected $table = 'story';
    protected $fillable = ['name', 'thumbnail'];

    public static function getAllStories()
    {
        return self::all();
    }

    public static function getStoryById($story_id)
    {
        return self::where('id', $story_id)->first();
    }

    public static function createStory($data)
    {
        return self::create($data);
    }

    public static function updateStory($story_id, $data)
    {
        $story = DB::table('story')->where('id', $story_id)->first();
        if (!$story) {
            return false;
        }

        DB::table('story')->where('id', $story_id)->update($data);
        return true;
    }

    public static function deleteStory($story_id)
    {
        $story = DB::table('story')->where('id', $story_id)->first();
        if (!$story) {
            return false;
        }

        DB::table('story')->where('id', $story_id)->delete();
        return true;
    }
}
