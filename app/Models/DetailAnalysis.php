<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailAnalysis extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function relatedQuiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
