<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UUID, HasRoles;

    protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'avatar',
        'birth_date',
        'password',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'PlayerFilters'))->apply();
    }

    // Helps the application specify the field type in the database
    public function getKeyType ()
    {
        return 'string';
    }

    public function fullName() : string
    {
        return $this->first_name . ' ' .  $this->last_name;
    }

    // public function userImages()
    // {
    //     return $this->hasMany(UserImage::class);
    // }


    public function role()
    {
        return $this->hasMany(Role::class);
    }

    public function playerRatings()
    {
        return $this->belongsToMany(User::class, 'player_ratings', 'to_user_id', 'from_user_id');
    }

    public function avgRating()
    {
        return $this->playerRatings()->avg('rate');
    }

    public function sportTypes()
    {
        return $this->belongsToMany(SportType::class, 'user_sport_types', 'user_id', 'sport_type_id');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    // }

    // public function favoritePlayer()
    // {
    //     return $this->belongsTo(FavoritePlayer::class, 'id', 'to_user_id');
    // }

    public function requestMatches()
    {
        return $this->belongsToMany(Matches::class, 'request_matches', 'user_id', 'match_id');
    }

    // public function requestReservations()
    // {
    //     return $this->hasMany(RequestReservation::class, 'requested_user_id', 'id');
    // }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // public function positions()
    // {
    //     return $this->belongsToMany(Position::class, 'player_positions', 'user_id', 'position_id');
    // }

    // public function playerSetting()
    // {
    //     return $this->belongsToMany(PlayerSetting::class);
    // }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_teams', 'user_id', 'team_id');
    }

    public function userActiveAddress()
    {
        return $this->hasOne(UserAddress::class)->where('status', 1)->with('district');
    }

    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class)->with('district');
    }

    public function playerTeam()
    {
        return $this->hasMany(PlayerTeam::class, 'user_id', 'id');
    }

    public function statusDefinition()
    {
        return $this->belongsTo(Definition::class, 'player_status', 'value')
            ->where('group_key', 'player_status');
    }

    public function getPlayerStatusTextAttribute(): string
    {
        return $this->statusDefinition->description_tr ?? 'Bilinmiyor';
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'causer_id');
    }
    // public function matchTeamPlayer()
    // {
    //     return $this->belongsTo(MatchTeamPlayer::class, 'id', 'user_id');
    // }
}
