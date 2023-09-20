<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface Text_ConfigRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllConfig($page_id);

    public function configText($touch_id, $data);

    public function updateTextConfig($text_id, $data);

    public function deleteTextConfig($text_id);
}
