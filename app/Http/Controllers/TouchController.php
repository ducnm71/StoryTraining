<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interface\TouchRepositoryInterface;
use App\Repositories\Repository\TextRepository;
use App\Repositories\Repository\Text_ConfigRepository;
use App\Repositories\Repository\AudioRepository;

class TouchController extends Controller
{
    protected $touchRepository;
    public AudioRepository $audio;
    public Text_ConfigRepository $text_config;
    public TextRepository $text;
    public function __construct(TouchRepositoryInterface $touchRepository, TextRepository $text,AudioRepository $audio, Text_ConfigRepository $text_config)
    {
        $this->touchRepository = $touchRepository;
        $this->text = $text;
        $this->audio = $audio;
        $this->text_config = $text_config;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($page_id)
    {
        return response()->json($this->touchRepository->getAllTouch($page_id), 200);
    }

    // public function index()
    // {
    //     return response()->json(Text_Config::getAllConfig(), 200);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $page_id)
    {
        $data = $request->validate([
            'text' => 'required',
            'file' => 'required',
            'data' => 'required',
        ]);

        $dataConfig = [
            'point_x' => ($data['data']['x2'] + $data['data']['x1']) / 2,
            'point_y' => ($data['data']['y2'] + $data['data']['y1']) / 2,
        ];

        $checkText = $this->text->findByText($data);
        if($checkText){
            $touch1 = $this->touchRepository->createTouch($page_id, $checkText->id, $data);
            $newTextConfig1 = $this->text_config->configText($page_id, $checkText->id, $dataConfig);
            return response()->json(['text' => $checkText, 'touch' => $touch1,'config' => $newTextConfig1, 'existed'], 200);
        } else {
            $newText = $this->text->createText($data);
            $this->audio->createAudio($newText->id, $data);
            $touch2 = $this->touchRepository->createTouch($page_id, $newText->id, $data);
            $newTextConfig2 = $this->text_config->configText($page_id, $newText->id, $dataConfig);
            return response()->json(['text' => $newText, 'touch' => $touch2, 'config' => $newTextConfig2], 200);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($text_id)
    {
        return response()->json($this->touchRepository->getTouch($text_id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $text_id)
    {
        $data = $request->validate([
            'data' => 'required|json'
        ]);
        $touch = $this->touchRepository->updateTouch($text_id, $data);
        if(!$touch){
            return response()->json(['msg' => 'Text not found'], 404);
        }
        return response()->json(['msg'=>'Text updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($text_id)
    {
        $result = $this->touchRepository->deleteTouch($text_id);

        if (!$result) {
            return response()->json(['message' => 'Text not found'], 404);
        }

        return response()->json(['message' => 'Text deleted successfully'], 200);
    }
}
