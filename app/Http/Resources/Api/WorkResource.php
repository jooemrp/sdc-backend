<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        $data['content_url'] = [];
        foreach ($this->getMedia('Work_content') as $content) {
            $data['content_url'][] = $content->getUrl();
        }

        return $data;
    }
}
