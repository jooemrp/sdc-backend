<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        $data['thumbnail'] = $this->getFirstMediaUrl('Content_thumbnail') ?? '';

        $data['contents'] = [];
        foreach ($this->getMedia('Content') as $content) {
            $data['contents'][] = $content->getUrl();
        }

        return $data;
    }
}
