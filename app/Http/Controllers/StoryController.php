<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interface\StoryRepositoryInterface;

class StoryController extends Controller
{
    //

    protected $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index()
    {
        return response()->json($this->storyRepository->all());
    }

    public function show($story_id)
    {
        $story = $this->storyRepository->find($story_id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json($story, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255',
            'author' => 'required'
        ], [
            'name.required' => 'Name of story is required',
            'thumbnail.required' => 'Thumbnail of story is required',
            'author.required' => 'author of story is required'
        ]);

        $story = $this->storyRepository->create($data);

        return response()->json(['story'=>$story, 'msg'=>'Story created successfully'],200);
    }

    public function update(Request $request, $story_id)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'thumbnail' => 'string|max:255',
        ]);

        $story = $this->storyRepository->update($story_id, $data);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json(['msg'=>'Story updated successfully'],200);
    }

    public function destroy($story_id)
    {
        $result = $this->storyRepository->delete($story_id);

        if (!$result) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json(['message' => 'Story deleted successfully'], 200);
    }
}
