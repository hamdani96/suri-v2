<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hobby extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function relatedCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function relatedUpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
