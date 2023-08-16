<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\AudioRepositoryInterface;
use App\Models\Audio;

class AudioRepository extends BaseRepository implements AudioRepositoryInterface
{
    public function __construct(Audio $audio)
    {
        parent::__construct($audio);
    }
    public function createAudio($text_id, $data){
        return Audio::create([
            'file' => $data['file'],
            'text_id' => $text_id
        ]);
    }
}
