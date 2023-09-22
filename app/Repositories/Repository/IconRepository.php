<?php

namespace App\Repositories\Repository;

use App\Models\Icon;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\IconRepositoryInterface;

class IconRepository extends BaseRepository implements IconRepositoryInterface
{
    public function __construct(Icon $icon)
    {
        parent::__construct($icon);
    }
    public function createIcon($text_id, $data){
        return Icon::create([
            'path' => $data['path'],
            'text_id' => $text_id
        ]);
    }
}
