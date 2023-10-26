<?php

namespace App\Services;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator as BasePathGenerator;

class PathGenerator implements BasePathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        // dd($media->collection_name . '/' . $media->name . '/' . md5($media->id . config('app.key')));
        return $media->collection_name . '/' . md5($media->id . config('app.key')) . '/';



        // . md5($media->id . config('app.key')) . '/' . $media->type . $media->slug . '/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $media->collection_name . '/' . md5($media->id . config('app.key')) . '/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $media->collection_name . '/' . $media->name . '/' . md5($media->id . config('app.key')) . '/responsive/';
    }
}
