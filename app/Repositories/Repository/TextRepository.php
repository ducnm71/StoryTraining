<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\TextRepositoryInterface;
use App\Models\Text;

class TextRepository extends BaseRepository implements TextRepositoryInterface
{
    public function __construct(Text $text)
    {
        parent::__construct($text);
    }
}
