<?php

namespace App\Models;

use App\Models\Concerns\HasCommonColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Comment extends Model
{
    use HasFactory, HasCommonColumns;

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
