<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

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
        'created_at',
        'updated_at',
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
}
