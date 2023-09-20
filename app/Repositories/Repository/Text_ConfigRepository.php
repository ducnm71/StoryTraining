<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\Text_ConfigRepositoryInterface;
use App\Models\Text_Config;
use App\Models\Text;

class Text_ConfigRepository extends BaseRepository implements Text_ConfigRepositoryInterface
{
    public function __construct(Text_Config $text_config)
    {
        parent::__construct($text_config);
    }

    public function getAllConfig($page_id){
        $configs = Text_Config::where('page_id', $page_id)->get();
        // $text_ids =  $configs->pluck('text_id');
        // return Text::whereIn('id', $text_ids)->get();
        return $configs;
    }

    public function configText($touch_id, $data){
        return Text_Config::create([
            'touch_id' => $touch_id,
            'point_x' => $data['point_x'],
            'point_y' => $data['point_y']
        ]);
    }

    public function updateTextConfig($text_id, $data){
        return Text_Config::where('text_id', $text_id)->update($data);
    }

    public function deleteTextConfig($text_id){
        return Text_Config::where('text_id', $text_id)->delete();
    }
}
