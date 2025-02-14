<?php

namespace App\Actions;

class AddComment
{
    public function handle($data)
    {
        $modelClass = $data['commentable_type'] === 'post' ? 'App\Models\Post' : 'App\Models\Video';
        $commentable = $modelClass::findOrFail($data['commentable_id']);

        return $commentable->comments()->create([
            'user_id' => $data['user_id'],
            'body' => $data['body'],
        ]);
    }
}