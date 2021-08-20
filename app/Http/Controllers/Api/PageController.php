<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Http\Resources\PageBlocksResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return PageResource::collection(Page::with('blocks')->get());
    }
    
    public function show($id){
        return new PageResource(Page::find($id));
    }

    public function searchByName(Request $request)
    {
        $page_name = $request->page_name;

        // return PageBlocksResource::collection(Page::with('blocks:blocks.layout')->searchByPageName($page_name));
        $page = PageBlocksResource::collection(Page::with('blocks:blocks.layout')->searchByPageName($page_name));

        foreach($page as $t){
            return response()->json($t) ;
        }

    }

}
