<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'challenge',
        'approach',
        'result',
        'img_url',
        'color',
        'preview',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public static function boot()
    {
        parent::boot();
        date_default_timezone_set("Asia/Makassar");
        self::creating(function ($model) {
            $model->created_at = date("Y-m-d H:i:s");
            $model->updated_at = date("Y-m-d H:i:s");
        });

        self::updating(function ($model) {
            $model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
