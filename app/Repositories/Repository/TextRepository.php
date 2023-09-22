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

    public function createText($data)
    {
        if(isset($data['syncText'])){
            return Text::create([
                'text' => $data['text'],
                'syncText' => json_encode($data['syncText'])
            ]);
        }else{
            return Text::create([
                'text' => $data['text']
            ]);
        }
    }

    public function findByText($data)
    {
        return Text::where('text', $data['text'])->first();
    }
}
