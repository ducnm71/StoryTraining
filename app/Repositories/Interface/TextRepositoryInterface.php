<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface TextRepositoryInterface extends BaseRepositoryInterface
{
    public function createText($data);

    public function findByText($data);
}
