<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\TouchRepositoryInterface;
use App\Models\Touch;
use App\Models\Text;

class TouchRepository extends BaseRepository implements TouchRepositoryInterface
{
    public function __construct(Touch $touch)
    {
        parent::__construct($touch);
    }

    public function getAllTouch($page_id){
        $configs = Touch::where('page_id', $page_id)->get();
        $text_ids =  $configs->pluck('text_id');
        return Text::whereIn('id', $text_ids)->get();
    }

    public function getTouch($text_id){
        return Touch::where('text_id', $text_id)->first();
    }

    public function createTouch($page_id, $text_id, $data){
        return Touch::create([
            'page_id' => $page_id,
            'text_id' => $text_id,
            'data' => $data['data']
        ]);
    }

    public function updateTouch($text_id, $data){
        $touch = Touch::where('text_id', $text_id)->first();
        if(!$touch){
            return false;
        }
        Touch::where('text_id', $text_id)->update($data);
        return true;
    }

    public function deleteTouch($text_id){
        $touch = Touch::where('text_id', $text_id)->first();
        if(!$touch){
            return false;
        }
        Touch::where('text_id', $text_id)->delete();
        return true;
    }
}
