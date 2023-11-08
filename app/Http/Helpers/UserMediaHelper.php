<?php

namespace App\Http\Helpers;

use App\Models\UserMedia;

class UserMediaHelper
{
    public static function imageList()
    {
        $user_medias = UserMedia::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return json_encode(self::getFileList($user_medias));
    }

    public static function getFileList($user_medias)
    {
        return collect($user_medias)->map(function ($item) {
            return [
                'title' => $item->getFirstMedia($item->type)?->file_name,
                'value' => $item->getFirstMediaUrl($item->type),
            ];
        })->toArray();
    }
}
