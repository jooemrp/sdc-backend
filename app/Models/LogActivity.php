<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function add($subject)
    {
        $log = [];

        if (auth()->check()) {
            $log['user_id'] = auth()->id();
            // } elseif (auth()->guard('api')->check()) {
            //     $log['user_id'] = auth()->guard('api')->id();
        } else {
            $log['user_id'] = NULL;
        }

        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');

        return self::create($log);
    }

    public static function boot()
    {
        parent::boot();
        date_default_timezone_set("Asia/Makassar");
        self::creating(function ($model) {
            $model->created_at = date("Y-m-d H:i:s");
        });

        self::updating(function ($model) {
            $model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
