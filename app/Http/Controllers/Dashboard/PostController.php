<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //echo view ('dashboard.post.index',compact('posts'));
    //dd($posts);
    //return route("post.create");
    //return redirct("/post/create");
    //return redirct()->route("post.create");
    //return to_route("post.create");

   //dd(Category::find(1)->posts());

    $posts = Post::paginate(2);
    return view ('dashboard.post.index',compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::pluck('id','title');
        $post = new Post();
       //$categories = Category::get();
       //dd($categories[0]->title);
       //dd($categories);

        echo view('dashboard.post.create', compact('categories', 'post'));
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

        $post = new Post();

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->posted = $request->posted;
            $post->category_id = $request->category_id;
           //dd($post->category_id);
            $post->save();


        return view('dashboard.post.create',compact('categories'));
 
    //dd(request("slug"));
    // dd();
    //echo $request->input('slug');
    //echo request("title");
    //dd(request("title"));
    //dd($request);
    //var_dump($request);

    //$request->validator(StoreRequest::myRules());
    //$validated = validator::make($request->all(),StoreRequest::myRules());

    //dd($validated->errors());
    //dd($validated->fails());

    //$data = array_merge($request->all(),['image' => '']);
    //dd($data); 

    //dd($request->validated()['slug']);
    
    //$validated = Validator::make($request->all(),StoreRequest::myRules());
    //dd($validated->fails());
    //dd($validated->errors());


    //$data = array_merge($request->all(),['image' => '']);
    //dd($data);

    // $data = $request->validated();
    // $data['slug']= Str::slug($data['title']);
    // dd($data);


    //return route("post.create");
    //return redirct("/post/create");
    //return redirct()->route("post.create");
    //return to_route("post.create");

    //dd($request->validated());
    //dd($request->all()); 


    Post::create($request->validated());
    return to_route("post.index")->with('status', "Registro creado.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
    

    if( isset($request->validated()["image"]) && $request->validated()["image"]){

        //dd($request->image);
        //dd($request->validated()["image"]->extension());
        $filename = time().".".$request->validated()["image"]->extension();
        //dd($filename);
        $request->validated()["image"]->move(public_path("image"), $filename);

    }

    
        $post->update($request->validated());
        //$request->session()->flash('status', "Registro actualizado.");
        return to_route("post.index")->with('status', "Registro actualizado.");
    }




    // public function update(PutRequest $request, Post $post)
    // {
    
    //  $data = $request->validated();
    //  if( isset($data ["image"]) ){
    //     //dd($request->image);
    //     //dd($request->validated()["image"]->extension());
    //     $data ["image"] = $filename = time().".".$data ["image"]->extension();
    //     //dd($filename);
    //     $request->image->move(public_path("image/otro"), $filename);

    // }
    //     $post->update($data);
    //     //$request->session()->flash('status', "Registro actualizado.");
    //     return to_route("post.index")->with('status', "Registro actualizado.");
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo "destroy";
        $post->delete();
        return to_route("post.index")->with('status', "Registro eliminado.");
    }
}
