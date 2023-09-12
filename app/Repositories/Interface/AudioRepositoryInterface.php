<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface AudioRepositoryInterface extends BaseRepositoryInterface
{
    public function createAudio($text_id, $data);
}
