<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface IconRepositoryInterface extends BaseRepositoryInterface
{
    public function createIcon($text_id, $data);
}
