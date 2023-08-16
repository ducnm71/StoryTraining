<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface TouchRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllTouch($page_id);

    public function getTouch($text_id);

    public function createTouch($page_id, $text_id, $data);

    public function updateTouch($text_id, $data);

    public function deleteTouch($text_id);
}
