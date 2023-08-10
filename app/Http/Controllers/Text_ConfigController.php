<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text_Config;

class Text_ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page_id)
    {
        return response()->json(Text_Config::getAllConfig($page_id), 200);
    }

    // public function index()
    // {
    //     return response()->json(Text_Config::getAllConfig(), 200);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $page_id, $text_id)
    {
        $data = $request->validate([
            'point_x' => 'required|numeric|min:0',
            'point_y' => 'required|numeric|min:0'
        ]);

        $text_config = Text_Config::configText($page_id, $text_id, $data);
        return response()->json($text_config, 200);
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
        return response()->json(Text_Config::getTextConfig($text_id), 200);
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
            'point_x' => 'numeric|min:0',
            'point_y' => 'numeric|min:0'
        ]);
        $text_config = Text_Config::updateTextConfig($text_id, $data);
        if(!$text_config){
            return response()->json(['msg' => 'Text not found'], 404);
        }
        return response()->json(['msg'=>'Text updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($text_id)
    {
        $result = Text_Config::deleteTextConfig($text_id);

        if (!$result) {
            return response()->json(['message' => 'Text not found'], 404);
        }

        return response()->json(['message' => 'Text deleted successfully'], 200);
    }
}
