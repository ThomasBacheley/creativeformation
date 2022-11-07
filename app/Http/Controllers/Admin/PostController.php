<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.posts.dashboard', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Post::where('id', $id)->update([
            'title' => $request->InputTitle,
            'slug' => $request->InputSlug,
            'description' => $request->InputDesc,
            'ispublish' => isset($request->checkbox)
        ]);

        $posts = Post::latest()->get();
        return view('admin.posts.index', ['posts' => $posts]);
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
        $posts = Post::latest()->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }
}
