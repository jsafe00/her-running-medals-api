<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateUpdateCommentFormRequest;
use App\Http\Resources\CommentResource;
use App\Http\Repositories\CommentsRepository;
use App\Models\Event;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventCommentController extends Controller
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
     * @param Event $event
     * @return AnonymousResourceCollection
     */
    public function list(Event $event): AnonymousResourceCollection
    {
        $comments = $this->commentsRepository->get($event);

        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateCommentFormRequest $request
     * @param Event $event
     * @return CommentResource
     */
    public function create(CreateUpdateCommentFormRequest $request, Event $event): CommentResource
    {
        $comment = $this->commentsRepository->create($event, $request->validated());

        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateCommentFormRequest $request
     * @param Event $event
     * @param Comment $comment
     * @return CommentResource
     */
    public function update(CreateUpdateCommentFormRequest $request, Event $event, Comment $comment): CommentResource
    {
        $comment = $this->commentsRepository->update($comment, $request->validated());

        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @param Comment $comment
     * @return CommentResource
     */
    public function destroy(Event $event, Comment $comment): CommentResource
    {
        $comment = $this->commentsRepository->delete($comment);

        return new CommentResource($comment);
    }
}
