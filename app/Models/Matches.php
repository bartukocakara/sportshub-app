<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matches extends Model
{
    /** @use HasFactory<\Database\Factories\MatchesFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'court_id',
        // 'match_type_id',
        'match_status',
        'sport_type_id',
        // 'field_type_id',
        // 'payment_transaction_id',
        // 'reservation_id',
        // 'field_usage_type',
        'title',
        'price',
        'max_player',
        'min_player',
        'max_team',
        'min_team',
        'description',
        'gender',
        'type',
        'is_court_private',
        'start_date',
        'expiring_date',
        'play_date',
        'from_hour',
        'to_hour'
    ];

    public function scopeFilterByPlayer($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'PlayerMatchFilters'))->apply();
    }

    public function scopeFilterByTeam($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'TeamMatchFilters'))->apply();
    }

    public function statusDefinition()
    {
        return $this->belongsTo(Definition::class, 'match_status', 'value')
            ->where('group_key', 'match_status');
    }

    public function sportType(): BelongsTo
    {
        return $this->belongsTo(SportType::class);
    }

    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class);
    }

    public function getMatchStatusTextAttribute(): string
    {
        return $this->statusDefinition->description_tr ?? 'Bilinmiyor';
    }

    public function getCityTitleAttribute(): string
    {
        return $this->city->title ?? 'Bilinmiyor';
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->match_status) {
            'pending'   => 'badge-light-warning',
            'confirmed' => 'badge-light-success',
            'completed' => 'badge-light-info',
            'canceled'   => 'badge-light-danger',
            default    => 'badge-light-secondary',
        };
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    public function matchTeams()
    {
        return $this->hasMany(MatchTeam::class, 'match_id', 'id');
    }

    public function teamMatches()
    {
        return $this->hasMany(TeamMatch::class, 'match_id', 'id');
    }

    public function scopeIsAvailableAt($query, $fromDate, $toDate, $fromHour, $toHour, $playDate = null)
    {
        // ->where('match_status_id', StatusEnum::APPROVED)
        return $query->where(function ($query) use ($fromDate, $toDate, $playDate) {
            if ($playDate) {
                $query->where('play_date', '=', $playDate);
            } else {
                $query->whereBetween('play_date', [$fromDate, $toDate]);
            }
            })->whereBetween('start_date', [$fromDate, $toDate])
                    ->where(function ($query) use ($fromHour, $toHour) {

                        $query->where(function ($query) use ($fromHour, $toHour) {
                            $query->where('from_hour', '>=', $fromHour)
                                ->where('from_hour', '<', $toHour);
                        })
                        ->orWhere(function ($query) use ($fromHour) {
                            $query->where('from_hour', '<', $fromHour)
                                ->where('to_hour', '>', $fromHour);
                        });
        });
    }

    public function scopeIsNotAvailableAt($query, $fromDate, $toDate, $fromTime, $toTime)
    {
        return $query->where('start_date', $fromDate)->orWhereBetween('play_date', [$fromDate, $toDate])
            ->where(function ($query) use ($fromTime) {
                        $query->where('from_hour', '>', $fromTime)
                            ->where('to_hour', '<', $fromTime);
                });
    }

    public function matchOwners()
    {
        return $this->belongsToMany(User::class, 'match_owners', 'match_id', 'user_id');
    }

    public function requestMatchTeamPlayers()
    {
        return $this->hasManyThrough(RequestMatchTeamPlayer::class, MatchTeam::class, 'match_id', 'match_team_id');
    }

    public function getMatchTeamPlayersCountAttribute(): int
    {
        return $this->matchTeams->sum(function ($team) {
            return $team->matchTeamPlayers->count();
        });
    }
}
