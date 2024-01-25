<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(): View
    {
        $allPosts = Post::query()->paginate(5);
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create(): View
    {
        $user = Auth::user();
        return view('posts.create', ['user' => $user]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);

        return to_route(route:'posts.index');
    }

    public function edit(Post $post): View
    {
        $users = User::all();

        return view('posts.edit', ['post' => $post , 'users' => $users]);
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);

        return to_route('posts.show', $post);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return to_route(route:'posts.index');
    }
}
