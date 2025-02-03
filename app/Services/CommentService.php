<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService extends CrudService
{
    protected CommentRepository $commentRepository;

    /**
     * @param CommentRepository $commentRepository
     * @return void
    */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
        parent::__construct($this->commentRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
