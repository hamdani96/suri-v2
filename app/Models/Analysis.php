<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analysis extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relatedDetailAnalysis()
    {
        return $this->hasMany(DetailAnalysis::class, 'analysis_id');
    }

    public function relatedTrainingAnalysis()
    {
        return $this->hasMany(TrainingAnalysis::class, 'analysis_id');
    }
}
