<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Pridanie komentára
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|max:500',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $postId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('post.show', Post::find($postId)->slug)->with('success', 'Komentár bol pridaný.');
    }

    public function update(Request $request, Comment $comment){
        if(auth()->id() != $comment->user_id && !auth()->user()->isAdmin()){
        }
        $request->validate([
            'content' => 'required|max:500',
        ]);
        $comment->update([
            'content' => $request->input('content'),
        ]);
        return redirect()->back()->with('success', 'Komentár bol aktualizovaný.');
    }

    // Mazanie komentára
    public function destroy(Comment $comment)
    {
        if (auth()->id() == $comment->user_id || auth()->user()->isAdmin()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Komentár bol zmazaný.');
        }

        return redirect()->back()->with('error', 'Nemáte oprávnenie na zmazanie tohto komentára.');
    }
}

