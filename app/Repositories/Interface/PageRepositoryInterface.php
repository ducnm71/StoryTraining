<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface PageRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllPage($story_id);

    public function createPage($story_id, $data);
}
