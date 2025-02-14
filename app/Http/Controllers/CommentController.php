<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function store(CommentRequest $request): JsonResponse
    {
        $modelClass = $request->commentable_type === 'post' ? 'App\Models\Post' : 'App\Models\Video';
        $commentable = $modelClass::findOrFail($request->commentable_id);

        $comment = $commentable->comments()->create([
            'user_id' => $request->user_id,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Comment Added', 'comment' => $comment], 201);
    }
}
