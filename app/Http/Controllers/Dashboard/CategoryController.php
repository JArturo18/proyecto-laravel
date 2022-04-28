<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
//use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $categories = Category::paginate(2);
    return view ('dashboard.category.index',compact('categories'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $category = new Category();
        echo view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $categories = Category::pluck('id','title');
        $category = new category();
            $category->title = $request->title;
            // $category->slug = $request->slug;
            // $category->description = $request->description;
            // $category->content = $request->content;
            // $category->posted = $request->categoryed;
            // $category->category_id = $request->category_id;
            //dd($category->category_id);
            $category->save();
    return view('dashboard.category.create',compact('categories', 'category'));

    Category::create($request->validated());
    return to_route("category.index")->with('status', "Registro creado.");
    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("dashboard.category.show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
     
        echo view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, category $category)
    {
        $category->update($request->validated());
        return to_route("category.index")->with('status', "Registro actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //echo "destroy";
        $category->delete();
        return to_route("category.index")->with('status', "Registro eliminado.");
    }
}
