<?php

namespace App\Services;

use App\Models\Comment;

/**
 * Class CommentService
 * @package App\Services
 */
class CommentService
{
    public Comment $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function index()
    {
        try {
            $comments = $this->comment->query()->with('user', 'childrens', 'post');

            return $comments;
        } catch (\PDOException $e) {
        }
    }
}
