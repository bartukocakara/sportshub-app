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

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'AnnouncementFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function causer()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    public function teamTypeDefinition()
    {
        return $this->hasOne(Definition::class, 'value', 'type')
                    ->where('group_key', 'team_announcement_type');
    }

    public function matchTypeDefinition()
    {
        return $this->hasOne(Definition::class, 'value', 'type')
                    ->where('group_key', 'match_announcement_type');
    }

    public function courtTypeDefinition()
    {
        return $this->hasOne(Definition::class, 'value', 'type')
                    ->where('group_key', 'court_announcement_type');
    }

    public function userTypeDefinition()
    {
        return $this->hasOne(Definition::class, 'value', 'type')
                    ->where('group_key', 'user_announcement_type');
    }

    public function reservationTypeDefinition()
    {
        return $this->hasOne(Definition::class, 'value', 'type')
                    ->where('group_key', 'reservation_announcement_type');
    }
}
