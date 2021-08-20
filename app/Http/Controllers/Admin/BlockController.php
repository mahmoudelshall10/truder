<?php

namespace App\Http\Controllers\Admin;

use App\Models\Block;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlockController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin.blocks.index|admin.blocks.create|admin.blocks.edit|admin.blocks.destroy', ['only' => ['index','store']]);
        $this->middleware('permission:admin.blocks.index', ['only' => ['index']]);
        $this->middleware('permission:admin.blocks.create', ['only' => ['create','store']]);
        $this->middleware('permission:admin.blocks.active', ['only' => ['store']]);
        $this->middleware('permission:admin.blocks.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.blocks.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::get();
        return view('admin.blocks.index',compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.create');
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
            'name'     => 'required|string|unique:blocks,name|max:191',
            'layout'   => 'required',
            'photo'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];

        $names = 
        [
            'name'   => 'Name',
            'layout' => 'Layout',
            'photo'  => 'Photo'
        ];

        $this->validate(request(),$rules, [],$names);

        $block = new Block();
        $block->name       = $request->name;
        $block->layout     = html_entity_decode($request->layout);
        $block->created_by = Auth::id();
        $block->photo      = storeImage($request ,'photo' , 'storage/app/blocks_photos/', $block->created_by, 'blocks');
        $block->save();

        return redirect()->route('admin.blocks.index')
            ->with('success','Block created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $block  = Block::find($id);
        return view('admin.blocks.show',compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block  = Block::find($id);
        return view('admin.blocks.edit',compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $block             = Block::find($id);

        $rules = 
        [
            'name'     => 'required|string|max:191|unique:blocks,name,'.$id,
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'layout'   => 'required',
        ];
        if($request->photo){
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096';
        }

        $names = 
        [
            'name'   => 'Name',
            'photo'  => 'Photo',
            'layout' => 'Layout'
        ];

        $this->validate(request(),$rules, [],$names);

        $block->name       = $request->name;
        $block->layout     = html_entity_decode($request->layout);
        if($request->photo != null)
        {
            File::delete($block->photo); // delete previous image from folder   
            $block->photo  = storeImage($request ,'photo' , 'storage/app/blocks_photos/', $block->created_by, 'blocks');
        }
        $block->update();

        return redirect()->route('admin.blocks.index')
            ->with('success','Block updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block   = Block::find($id);
        if($block->photo != null)
        {
            File::delete($block->photo); // delete previous image from folder   
        }
        $block->pages()->detach();
        $block->delete();

        return redirect()->route('admin.blocks.index')
            ->with('success','Block deleted successfully');


    }

    public function blockActive($id)
    {
        $block   = Block::find($id);
        if($block->active === 1)
        {
            $block->update(['active'=>0]);
            $block->pages()->detach();
            return redirect()->route('admin.blocks.index')
                ->with('success','Block deactivated successfully');

        }else if($block->active === 0){
            $block->update(['active'=>1]);
            return redirect()->route('admin.blocks.index')
                ->with('success','Block activated successfully');
        }
    }
}
