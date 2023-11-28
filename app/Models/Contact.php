<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'message',
        'description',
        'read_by'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = date("Y-m-d H:i:s");
        });

        static::updating(function ($model) {
            $model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
