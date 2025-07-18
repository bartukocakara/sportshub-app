<?php

namespace App\Models;

use App\Traits\Followable;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use Followable;

    protected $fillable = ['user_id'];

    public function followable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
