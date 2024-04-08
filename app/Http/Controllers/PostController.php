<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    private $post;
    private $category;
    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_categories = $this->category->all();

        return view('users.posts.create')->with('all_categories', $all_categories) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //
        $this->post->user_id = Auth::id();
        $this->post->description = $request->description;
        $this->post->image = 'data:image/'.$request->image->extension().';base64,'.
                              base64_encode(file_get_contents($request->image));
        $this->post->save();

       foreach($request->category as $category_id){
            $category_post[] = ["category_id" => $category_id];
       }

       $this->post->category_post()->createMany($category_post);
    //    create many is a loop that will save multiple data

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = $this->post->find($id);

        return view('users.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
