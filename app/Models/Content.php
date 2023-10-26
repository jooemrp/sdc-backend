<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'type',
        'status',
        'comment_status',
        'views',
        'parent_id',
        'language',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_by',
        'created_by_ip',
        'updated_by',
        'updated_by_ip',
        'featured_at',
        'featured_by',
        'featured_by_ip',
        'published_at',
        'published_by',
        'published_by_ip',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by_ip = request()->ip();
            $model->created_by = auth()->id();
            $model->created_at = date("Y-m-d H:i:s");
        });

        static::updating(function ($model) {
            $model->updated_by_ip = request()->ip();
            $model->updated_by = auth()->id();
            $model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
