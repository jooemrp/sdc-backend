<?php

namespace Modules\Form\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\factories\FormSubmitResponsesFactory;

class form_submit_responses extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): FormSubmitResponsesFactory
    {
        //return FormSubmitResponsesFactory::new();
    }
}
