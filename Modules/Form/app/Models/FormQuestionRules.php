<?php

namespace Modules\Form\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\factories\FormQuestionRulesFactory;

class form_question_rules extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): FormQuestionRulesFactory
    {
        //return FormQuestionRulesFactory::new();
    }
}
