<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();  // TODO реализуй правильное построение  ресурсов
        $resourcesGet = [];
        foreach ($resources as $resource) {
            $resource['category_parsing'] = \DB::table('categoryes_parsing')
                ->where('id', '=', $resource['category_parsing_id'])->value('category_parsing');
            $resource['source'] = \DB::table('sources')
                ->where('id', '=', $resource['source_id'])->value('source');
               
            $resourcesGet[] = $resource;
            
            
        }
        
        if (empty($resource)) {
            return view('aggregator.resources.index');
        }
        
        return view('aggregator.resources.index', 
            [
                'resources' => $resourcesGet
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aggregator.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceRequest $request)
    {
        
        if($request->isMethod('post')){
            $link = $request->input('link');
            $slug = $request->input('slug');
            $category_parsing = $request->input('category_parsing');
            $source = $request->input('source');
          
            $getCategoryId = \DB::table('categoryes_parsing')->select('id')->where('category_parsing', '=', $category_parsing)->get();
            $getSourceId = \DB::table('sources')->select('id')->where('source', '=', $source)->get();

            if(empty($getCategoryId[0])){
                $category_parsing_id = \DB::table('categoryes_parsing')->insertGetId(['category_parsing' => $category_parsing]);
                
            } else {
                $category_parsing_id = $getCategoryId[0] -> id;
            }

            if(empty($getSourceId[0])){
                $source_id = \DB::table('sources') -> insertGetId(['source' => $source]);
                
            } else {
                $source_id = $getSourceId[0] -> id;
            }


        }
        
        $resource = Resource::create([
            'link' => $link,
            'slug' => $slug,
            'category_parsing_id' => $category_parsing_id,
            'source_id' => $source_id
        ]);
        if($resource) {
            
            return redirect()->route('resource.create')
                ->with('success', 'Ресурс успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить ресурс.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        $categories = \DB::table('categoryes_parsing')->select('category_parsing')->get();
        $category_parsing = \DB::table('categoryes_parsing')
                ->where('id', '=', $resource['category_parsing_id'])->value('category_parsing');
        $source = \DB::table('sources')
                ->where('id', '=', $resource['source_id'])->value('source');
        return view('aggregator.resources.edit', [
            'categoryes' => $categories,
            'resource' => $resource,
            'category_parsing' => $category_parsing,
            'source' => $source,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceRequest $request, Resource $resource)
    {
        $resource->link = $request->input('link');
        $resource->slug = $request->input('slug');
        $category_parsing = $request->input('category_parsing');
        $source = $request->input('source');

        $getCategoryId = \DB::table('categoryes_parsing')->select('id')->where('category_parsing', '=', $category_parsing)->get();
        $getSourceId = \DB::table('sources')->select('id')->where('source', '=', $source)->get();

        if(empty($getCategoryId[0])){
            $category_parsing_id = \DB::table('categoryes_parsing')->insertGetId(['category_parsing' => $category_parsing]);
            
        } else {
            $category_parsing_id = $getCategoryId[0] -> id;
        }

        if(empty($getSourceId[0])){
            $source_id = \DB::table('sources') -> insertGetId(['source' => $source]);
            
        } else {
            $source_id = $getSourceId[0] -> id;
        }

      

        $resource['category_parsing_id'] = $category_parsing_id;
        $resource['source_id'] = $source_id;
        
        if($resource->save()) {
            return redirect()->route('resource.index')->with('success', 'Ресурс успешно изменен.');
        }

        return back()->with('error', 'Не удалось изменить ресурс.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        if($resource->delete()) {

            return redirect()->route('resource.index')->with('success', 'Ресурс успешно удален.');
        }
        return back()->with('error', 'Не удалось удалить ресурс');
    }
}
