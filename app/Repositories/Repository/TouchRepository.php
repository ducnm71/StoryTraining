<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\TouchRepositoryInterface;
use App\Repositories\Repository\TextRepository;
use App\Repositories\Repository\Text_ConfigRepository;
use App\Repositories\Repository\AudioRepository;

use App\Models\Touch;
use App\Models\Text;



class TouchRepository extends BaseRepository implements TouchRepositoryInterface
{
    public AudioRepository $audio;
    public Text_ConfigRepository $text_config;
    public TextRepository $text;
    public function __construct(Touch $touch, TextRepository $text,AudioRepository $audio, Text_ConfigRepository $text_config)
    {
        parent::__construct($touch);
        $this->text = $text;
        $this->audio = $audio;
        $this->text_config = $text_config;
    }

    public function getAllTouch($page_id){

        return Touch::select('text.id', 'text', 'syncText', 'file','data', 'point_x', 'point_y', 'text_config.touch_id')
                    ->join('page', 'touch.page_id', '=', 'page.id')
                    ->join('text_config', 'text_config.touch_id', '=', 'touch.id')
                    ->join('text', 'text.id', '=', 'touch.text_id')
                    ->join('audio', 'audio.text_id', '=', 'text.id')
                    ->where('page.id', '=', $page_id)
                    ->get();
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
        return Touch::where('text_id', $text_id)->update($data);
    }

    public function deleteTouch($touch_id){
        return Touch::where('id', $touch_id)->delete();
    }

}
