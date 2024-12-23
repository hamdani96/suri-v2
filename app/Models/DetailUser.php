<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function relatedHobby()
    {
        return $this->belongsTo(Hobby::class, 'hobby_id');
    }

    public function relatedPosition()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
