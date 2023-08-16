<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\StoryRepositoryInterface;
use App\Models\Story;

class StoryRepository extends BaseRepository implements StoryRepositoryInterface
{
    public function __construct(Story $story)
    {
        parent::__construct($story);
    }
}
