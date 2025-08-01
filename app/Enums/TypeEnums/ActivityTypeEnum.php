<?php

namespace App\Enums\TypeEnums;

enum ActivityTypeEnum: string
{
    case MatchCreated       = 'match.created';
    case MatchUpdated       = 'match.updated';
    case MatchCanceled      = 'match.canceled';
    case MatchJoined        = 'match.joined';
    case MatchTeamCreated   = 'match.match-team-created';
    case MatchTeamUpdated   = 'match.match-team-updated';
    case MatchDeleted       = 'match.deleted';

    case TeamCreated        = 'team.created';
    case TeamUpdated        = 'team.updated';
    case TeamJoined         = 'team.joined';

    case CourtCreated       = 'court.created';

    public function label(): string
    {
        return match ($this) {
            self::MatchCreated      => 'Maç oluşturuldu',
            self::MatchUpdated      => 'Maç güncellendi',
            self::MatchCanceled     => 'Maç iptal edildi',
            self::MatchTeamCreated  => 'Maç Takımı oluşturuldu',
            self::MatchTeamUpdated  => 'Maç Takımı güncellendi',
            self::MatchJoined       => 'Maça katıldı',
            self::TeamCreated       => 'Takım oluşturuldu',
            self::TeamUpdated       => 'Takım güncellendi',
            self::TeamJoined        => 'Takıma katıldı',
            self::CourtCreated      => 'Saha oluşturuldu',
        };
    }
}
