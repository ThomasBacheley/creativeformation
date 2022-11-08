<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('ispublish', 1)->latest()->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexadmin()
    {
        $posts = Post::latest()->get();
        return view('admin.dashboard', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->InputTitle;
        $post->slug = $request->InputSlug;
        $post->description = $request->InputDesc;
        $post->ispublish = isset($request->checkbox);
        $post->category_id = $request->InputCat;

        if (isset($request->image)) {
            $imagename = Str::uuid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagename);
            $post->imgname = $imagename;
        }

        if (isset($request->InputTags)) {
            $post->tag()->attach($request->tags);
        }

        $post->save();

        session()->flash('success', "L'articlbe a bien été enregistré");

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $post = Post::query()->where('id', $id)->where('slug', $slug)->firstOrFail();
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->InputTitle;
        $post->slug = $request->InputSlug;
        $post->description = $request->InputDesc;
        $post->ispublish = isset($request->checkbox);
        $post->category_id = $request->InputCat;

        if (isset($request->image)) {

            if ($post->imgname != null) {
                File::delete(public_path('images/' . $post->imgname));
            }

            $imagename = Str::uuid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagename);
            $post->imgname = $imagename;
        }

        if (isset($request->InputTags)) {
            $post->tag()->sync($request->InputTags);
        }

        $post->save();

        return redirect()->route('posts.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.dashboard');
    }
}
