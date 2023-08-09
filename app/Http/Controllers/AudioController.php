<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $text_id)
    {
        $data = $request->validate([
            'file' => 'required|string|max:255'
        ], [
            'file.required' => 'file is required'
        ]);

        $audio = Audio::createAudio($text_id, $data);
        return response()->json($audio, 200);
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
    public function show($audio_id)
    {
        $audio = Audio::getAudio($audio_id);
        return response()->json($audio, 200);
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
    public function update(Request $request, $audio_id)
    {
        $data = $request->validate([
            'file' => 'string|max:255'
        ]);
        $audio = Audio::updateAudio($audio_id, $data);
        if(!$audio){
            return response()->json(['msg' => 'audio not found'], 404);
        }
        return response()->json(['msg'=>'Audio updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($text_id)
    {
        $result = Audio::deleteAudio($text_id);

        if (!$result) {
            return response()->json(['message' => 'Audio not found'], 404);
        }

        return response()->json(['message' => 'Audio deleted successfully'], 200);
    }
}
