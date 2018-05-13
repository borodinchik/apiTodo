<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TaskCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'href' => [
                'link' => route('task.show', $this->id)
            ]

        ];
    }
}
