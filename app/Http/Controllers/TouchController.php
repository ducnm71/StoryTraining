<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Touch;

class TouchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page_id)
    {
        return response()->json(Touch::getAllTouch($page_id), 200);
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
            'data' => 'required'
        ]);

        $text_config = Touch::createTouch($page_id, $text_id, $data);
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
        return response()->json(Touch::getTouch($text_id), 200);
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
        $touch = Touch::updateTouch($text_id, $data);
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
        $result = Touch::deleteTouch($text_id);

        if (!$result) {
            return response()->json(['message' => 'Text not found'], 404);
        }

        return response()->json(['message' => 'Text deleted successfully'], 200);
    }
}
