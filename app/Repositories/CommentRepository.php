<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    protected Comment $comment;

    /**
     * @param Comment $comment
     * @return void
    */
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
        $this->comment = $comment;
    }
}
