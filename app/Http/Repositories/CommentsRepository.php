<?php

namespace App\Http\Repositories;

use App\Models\Event;
use App\Models\Medal;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CommentsRepository {

    public function get(Event|Medal $resource): EloquentCollection
    {
        return $resource->comments;
    }

    public function create(Event|Medal $resource, array $data): Comment
    {
        return $resource->comments()->create($data);
    }

    public function update(Comment $comment, array $data): Comment
    {
       $comment->update($data);
       return  $comment;
    }

    public function delete(Comment $comment): Comment
    {
       $comment->delete();
       return $comment;
    }
}
