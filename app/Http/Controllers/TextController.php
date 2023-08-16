<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interface\TextRepositoryInterface;

class TextController extends Controller
{


    protected $textRepository;

    public function __construct(TextRepositoryInterface $textRepository)
    {
        $this->textRepository = $textRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['text'=>$this->textRepository->all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string|max:255'
        ], [
            'text.required' => 'Text is required'
        ]);

        $text = $this->textRepository->create($data);
        return response()->json($text, 200);
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
        $text = $this->textRepository->find($text_id);
        return response()->json($text, 200);
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
            'text' => 'string|max:255'
        ]);
        $text = $this->textRepository->update($text_id, $data);
        if(!$text){
            return response()->json(['msg' => 'Text not found'], 404);
        }
        return response()->json(['msg'=>'Text updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($text_id)
    {
        $result = $this->textRepository->delete($text_id);

        if (!$result) {
            return response()->json(['message' => 'Text not found'], 404);
        }

        return response()->json(['message' => 'Text deleted successfully'], 200);
    }
}
