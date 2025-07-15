<?php

namespace App\Enums\TypeEnums;

enum AnnouncementSubjectTypeEnum: string
{
    case MATCHES = 'matches';
    case RESERVATIONS = 'reservations';
    case TEAMS = 'teams';
}
