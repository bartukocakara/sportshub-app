<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Announcement extends Model
{
    use HasFactory, UUID;

    protected $table = 'announcements';

    protected $fillable = [
        'type',
        'subject_type',
        'subject_id',
        'created_user_id',
        'sport_type_id',
        'title',
        'message',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'AnnouncementFilters'))->apply();
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function subject() : MorphTo
    {
        return $this->morphTo();
    }
}
