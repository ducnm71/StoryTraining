<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    protected $fillable = ['page_number', 'background', 'story_id'];

    public static function getAllPage($story_id)
    {
        return DB::table('page')->where('story_id', $story_id)->get();
    }

    public static function getPage($page_id){
        return $page = DB::table('page')->where('id', $page_id)->first();
    }

    public static function createPage($story_id, $data){
        // $pageInStory = $this->getAllPage($story_id);
        // $checkPage = $pageInStory
        return self::create(
            [
            'page_number'=> $data['page_number'],
            'background'=>$data['background'],
            'story_id'=>$story_id
            ]
        );
    }

    public static function updatePage($page_id, $data)
    {
        $page = DB::table('page')->where('id', $page_id)->first();
        if (!$page) {
            return false;
        }

        DB::table('page')->where('id', $page_id)->update($data);
        return true;
    }

    public static function deletePage($page_id)
    {
        $page = DB::table('page')->where('id', $page_id)->first();
        if (!$page) {
            return false;
        }

        DB::table('page')->where('id', $page_id)->delete();
        return true;
    }
}
