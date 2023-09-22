<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\PageRepositoryInterface;
use App\Models\Page;
use DB;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    public function __construct(Page $page)
    {
        parent::__construct($page);
    }

    public function getAllPage($story_id)
    {
        return Page::where('story_id', $story_id)->limit(1)->get();
    }

    public function createPage($story_id, $data){
        return Page::create([
            'page_number'=> $data['page_number'],
            'background'=>$data['background'],
            'story_id'=>$story_id
            ]);
    }
}
