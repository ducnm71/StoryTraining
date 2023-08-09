<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    //

    public function index()
    {
        return response()->json(['stories'=>Story::getAllStories()]);
    }

    public function show($story_id)
    {
        $story = Story::getStoryById($story_id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json($story, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255'
        ], [
            'name.required' => 'Name of story is required',
            'thumbnail.required' => 'Thumbnail of story is required'
        ]);

        $story = Story::createStory($data);

        return response()->json(['story'=>$story, 'msg'=>'Story created successfully'],200);
    }

    public function update(Request $request, $story_id)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'thumbnail' => 'string|max:255',
        ]);

        $story = Story::updateStory($story_id, $data);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json(['msg'=>'Story updated successfully'],200);
    }

    public function destroy($story_id)
    {
        $result = Story::deleteStory($story_id);

        if (!$result) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json(['message' => 'Story deleted successfully'], 200);
    }
}
