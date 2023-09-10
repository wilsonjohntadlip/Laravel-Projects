<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => ['required', 'min:5', 'max:20'],
            'body' => ['required', 'min:5', 'max:200'],
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = auth()->id();
        
        Post::create($incomingFields);

        return redirect('/');
    }

    public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        
        $post->update($incomingFields);
        return redirect('/');
        
    }
}