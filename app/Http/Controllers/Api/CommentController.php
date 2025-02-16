<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use ApiResponse;

    private CommentService $commentService;

    /**
     * Inject the CommentService.
     *
     * @param  CommentService $commentService
     * @return void
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * List all resources.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $items = $this->commentService->all($request);
        return $this->okApiResponse($items, 'Comments retrieved successfully.');
    }

    /**
     * Store a newly created resource.
     *
     * @param  CommentRequest $request
     * @return JsonResponse
     */
    public function store(CommentRequest $request): JsonResponse
    {
        $comment = $this->commentService->store($request->validated());
        return $this->createdApiResponse($comment, 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $comment = $this->commentService->show($id);
        return $this->okApiResponse($comment, 'Comment retrieved successfully.');
    }

    /**
     * Update the specified resource.
     *
     * @param  CommentRequest $request
     * @param  string $id
     * @return JsonResponse
     */
    public function update(CommentRequest $request, string $id): JsonResponse
    {
        $comment = $this->commentService->update($request->validated(), $id);
        return $this->okApiResponse($comment, 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $this->commentService->destroy($id);
        return $this->okApiResponse([], 'Comment deleted successfully.');
    }
}
