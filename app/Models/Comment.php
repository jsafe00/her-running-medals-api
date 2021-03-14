<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'body',
    ];

    /**
     * Get all of the models that own comments.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
