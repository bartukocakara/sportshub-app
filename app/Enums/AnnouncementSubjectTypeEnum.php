<?php

namespace App\Enums;

enum AnnouncementSubjectTypeEnum: string
{
    case MATCHES = 'matches';
    case RESERVATIONS = 'reservations';
    case TEAMS = 'teams';
}
