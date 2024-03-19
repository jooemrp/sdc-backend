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

        $ebook_available = [32, 53, 71, 85];
        $data['is_ebook_available'] = in_array($this->id, $ebook_available) ? true : false;

        return $data;
    }
}
