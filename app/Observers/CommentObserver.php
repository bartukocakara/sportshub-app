<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentObserver
{
    /**
     * Handle the Comment "creating" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        // Set the user_id to the currently authenticated user's ID
        if (Auth::check()) {
            $comment->user_id = Auth::id();
        }
    }
}
