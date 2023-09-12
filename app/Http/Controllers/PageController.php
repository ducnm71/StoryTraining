<?php


//validate, dataInput, logic, log, only res each controller, mix text audio

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Repositories\Interface\PageRepositoryInterface;

class PageController extends Controller
{
    protected $pageRepository;
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($story_id)
    {
        return response()->json($this->pageRepository->getAllPage($story_id),200);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $story_id)
    {
        $validatedData = $request->validate([
            'page_number' => 'required|integer',
            'background' => 'required|string|max:255',
        ], [
            'page_number.required' => 'page_number is required',
            'page_number.integer' => 'page_number must is int',
            'background.required' => 'background is required'
        ]);

        $page = $this->pageRepository->createPage($story_id, $validatedData);
        //find by id then insert

        return response()->json(['page'=>$page, 'msg'=>'Page created successfully'],200);
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
    public function show($page_id)
    {
        $page = $this->pageRepository->find($page_id);
        if(!$page){
            // return response()->json(['message' => 'Page not found'], 404);
            goto next;
        }
        next:
        return response()->json($page,200);
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
    public function update(Request $request, $page_id)
    {
        $validatedData = $request->validate([
            'page_number' => 'string|max:255',
            'background' => 'string|max:255',
            // 'story_id' => 'string|max:255'
        ]);

        $page = $this->pageRepository->update($page_id, $validatedData);

        if (!$page) {
            return response()->json(['message' => 'Page not found'], 404);
        }

        return response()->json(['msg'=>'Page updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($page_id)
    {
        $result = $this->pageRepository->delete($page_id);

        if (!$result) {
            return response()->json(['message' => 'Page not found'], 404);
        }

        return response()->json(['message' => 'Page deleted successfully'], 200);
    }
}
