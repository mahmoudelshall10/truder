<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Block;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageBlocks;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin.pages.index|admin.pages.create|admin.pages.edit|admin.pages.destroy', ['only' => ['index','store']]);
        $this->middleware('permission:admin.pages.index', ['only' => ['index']]);
        $this->middleware('permission:admin.pages.create', ['only' => ['create','store']]);
        $this->middleware('permission:admin.pages.active', ['only' => ['store']]);
        $this->middleware('permission:admin.pages.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.pages.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks = Block::where('active',1)->get();
        return view('admin.pages.create',compact('blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = 
        [
            'name'     => 'required|string|unique:pages,name|max:191',
            'slug'     => 'required|string|unique:pages,slug|max:191',
            'url'      => 'required|string|unique:pages,url|max:191',
            'blocks'   => 'required|array|max:1',
            'blocks.*' => 'required|integer|exists:blocks,id'
        ];

        $names = 
        [
            'name'   => 'Name',
            'slug'   => 'Slug',
            'url'    => 'URL',
            'blocks' => 'Blocks'
        ];

        $this->validate(request(),$rules, [],$names);

        $page       = new Page();
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->url  = $request->url;
        $page->created_by = Auth::id();
        $page->save();

        $page->blocks()->attach($request->blocks);

        return redirect()->route('admin.pages.index')
            ->with('success','Page created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $rules = 
        [
            'name'     => 'required|string|max:191|unique:pages,name,'.$id,
            'slug'     => 'required|string|max:191|unique:pages,slug,'.$id,
            'url'      => 'required|string|max:191|unique:pages,url,'.$id,
            'blocks'   => 'required|array|max:1',
            'blocks.*' => 'required|integer|exists:blocks,id'
        ];

        $names = 
        [
            'name'   => 'Name',
            'slug'   => 'Slug',
            'url'    => 'URL',
            'blocks' => 'Blocks'
        ];

        $data = $this->validate(request(),$rules, [],$names);

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->url  = $request->url;
        $page->update();

        $page->blocks()->sync($request->blocks);

        return redirect()->route('admin.pages.index')
            ->with('success','Page updated successfully');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->blocks()->detach();
        $page->delete();
        return redirect()->route('admin.pages.index')
            ->with('success','Page deleted successfully');
    }

    public function pageActive($id)
    {
        $page   = Page::find($id);
        if($page->active === 1)
        {
            $page->update(['active' => 0]);
            return redirect()->route('admin.pages.index')
                ->with('success','Page deactivated successfully');

        }else if($page->active === 0){
            $page->update(['active' => 1]);
            return redirect()->route('admin.pages.index')
                ->with('success','Page activated successfully');
        }
    }


    public function pageBlockIndex($id)
    {
        $blocks   = Page::with('manyblocks')->find($id);
        return view('admin.pages.blocks.index',compact('blocks'));
    }

    public function pageBlockShow($id,$block_id){
        $block = PageBlocks::where('page_id',$id)->where('block_id',$block_id)->first();

        return view('admin.pages.blocks.show',compact('block'));
    }

    public function pageBlockEdit($id,$block_id){
        $block = PageBlocks::where('page_id',$id)->where('block_id',$block_id)->first();

        return view('admin.pages.blocks.edit',compact('block'));
    }

    public function pageBlockUpdate($id,$block_id)
    {
        # code...
    }
}
