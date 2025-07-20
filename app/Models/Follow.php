<?php

namespace App\Models;

use App\Traits\Followable;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory, UUID, Followable;

    protected $fillable = ['user_id', 'followable_id', 'followable_type', 'status'];

    public function followable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
