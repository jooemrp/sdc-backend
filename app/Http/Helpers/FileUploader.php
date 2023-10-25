<?php

namespace App\Http\Helpers;

use Request;

class FileUploader
{
    public static function upload($model, $collection, $from_request, $action = 'store')
    {
        if ($action == 'update') {
            $model->clearMediaCollection($collection);
        }

        $model->addMediaFromRequest($from_request, 's3')
            ->toMediaCollection($collection, 's3');

        return $model;
    }
}
