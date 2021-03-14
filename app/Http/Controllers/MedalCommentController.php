<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateUpdateCommentFormRequest;
use App\Http\Resources\CommentResource;
use App\Http\Repositories\CommentsRepository;
use App\Models\Medal;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MedalCommentController extends Controller
{
    /**
     * CommentsController Constructor
     *
     * @param CommentsRepository $commentsRepository
     *
     */
    public function __construct(
        protected CommentsRepository $commentsRepository
    ) { }

    /**
     * Display a listing of the resource.
     *
     * @param Medal $medal
     * @return AnonymousResourceCollection
     */
    public function list(Medal $medal): AnonymousResourceCollection
    {
        $comments = $this->commentsRepository->get($medal);

        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateCommentFormRequest $request
     * @param Medal $medal
     * @return CommentResource
     */
    public function create(CreateUpdateCommentFormRequest $request, Medal $medal): CommentResource
    {
        $comment = $this->commentsRepository->create($medal, $request->validated());

        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateCommentFormRequest $request
     * @param Medal $medal
     * @param Comment $comment
     * @return CommentResource
     */
    public function update(CreateUpdateCommentFormRequest $request, Medal $medal, Comment $comment): CommentResource
    {
        $comment = $this->commentsRepository->update($comment, $request->validated());

        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Medal $medal
     * @param Comment $comment
     * @return CommentResource
     */
    public function destroy(Medal $medal, Comment $comment): CommentResource
    {
        $comment = $this->commentsRepository->delete($comment);

        return new CommentResource($comment);
    }
}
