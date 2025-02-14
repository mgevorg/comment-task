<?php

namespace App\Http\Controllers;

use App\Actions\AddComment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function store(CommentRequest $request, AddComment $addComment): JsonResponse
    {
        $comment = $addComment->handle($request->validated());

        return response()->json(['message' => 'Comment Added', 'comment' => $comment], 201);
    }
}
