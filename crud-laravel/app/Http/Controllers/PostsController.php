<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Session::get('posts', []);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $posts = Session::get('posts', []);
        $id = count($posts) + 1;
        $posts[$id] = [
            'id' => $id,
            'title' => $request->title,
            'content' => $request->content,
        ];
        Session::put('posts', $posts);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $posts = Session::get('posts', []);
        if (!isset($posts[$id])) {
            abort(404);
        }
        $post = $posts[$id];
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $posts = Session::get('posts', []);
        if (!isset($posts[$id])) {
            abort(404);
        }
        $post = $posts[$id];
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $posts = Session::get('posts', []);
        if (!isset($posts[$id])) {
            abort(404);
        }
        $posts[$id]['title'] = $request->title;
        $posts[$id]['content'] = $request->content;
        Session::put('posts', $posts);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $posts = Session::get('posts', []);
        if (isset($posts[$id])) {
            unset($posts[$id]);
            Session::put('posts', $posts);
        }

        return redirect()->route('posts.index');
    }
}