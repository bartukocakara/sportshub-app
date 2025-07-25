<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\Followable;
use App\Traits\LogsActivity;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory, UUID, Followable, LogsActivity;
    protected const DEFAULT_PLAYER_COUNT = 1;

    protected $fillable = [
        'sport_type_id',
        'city_id',
        'title',
        'team_status',
        'player_count',
        'gender',
        'min_player',
        'max_player',
        'followable_status',
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'TeamFilters'))->apply();
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'player_teams', 'team_id', 'user_id');
    }

    public function getUsersCountAttribute(): int
    {
        // Eğer ilişkili kullanıcılar zaten yüklenmişse, koleksiyon üzerinden sayar
        if ($this->relationLoaded('users')) {
            return $this->users->count();
        }

        // Aksi halde veritabanından sayar
        return $this->users()->count();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sportType()
    {
        return $this->belongsTo(SportType::class);
    }

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'subject');
    }

    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function statusDefinition()
    {
        return $this->belongsTo(Definition::class, 'team_status', 'value')
            ->where('group_key', 'team_status');
    }

    public function getTeamStatusTextAttribute(): string
    {
        return $this->statusDefinition->description_tr ?? 'Bilinmiyor';
    }

    public function getCityTitleAttribute(): string
    {
        return $this->city->title ?? 'Bilinmiyor';
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->team_status) {
            'active'   => 'badge-light-success',
            'inactive' => 'badge-light-warning',
            'banned'   => 'badge-light-danger',
            default    => 'badge-light-secondary',
        };
    }

    public function getStatusBadgeWithIconAttribute(): string
    {
        return match ($this->team_status) {
            'active' => '<span class="badge badge-light-success">
                            <i class="fas fa-check-circle text-success me-1"></i> ' . $this->team_status_text . '
                        </span>',

            'inactive' => '<span class="badge badge-light-warning">
                            <i class="fas fa-pause-circle text-warning me-1"></i> ' . $this->team_status_text . '
                        </span>',

            'banned' => '<span class="badge badge-light-danger">
                            <i class="fas fa-ban text-danger me-1"></i> ' . $this->team_status_text . '
                        </span>',

            default => '<span class="badge badge-light-secondary">
                            <i class="fas fa-question-circle text-muted me-1"></i> Bilinmiyor
                        </span>',
        };
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    public function requestPlayerTeams()
    {
        return $this->hasMany(RequestPlayerTeam::class);
    }

    public function teamLeaders()
    {
        return $this->hasMany(TeamLeader::class);
    }
}
