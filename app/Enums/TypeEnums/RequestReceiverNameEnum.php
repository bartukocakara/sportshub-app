<?php

namespace App\Enums\TypeEnums;

enum RequestReceiverNameEnum : string {
    case REQUEST_SPORT_TYPE = 'sport_type';
    case REQUEST_MATCH = 'match';
    case REQUEST_MATCH_OWNER = 'match_owner';
    case REQUEST_PLAYER_TEAM = 'player_team';
    case REQUEST_MATCH_TEAM_PLAYER = 'match_team_player';
    case REQUEST_MATCH_TEAM = 'match_team';
    case REQUEST_RESERVATION = 'reservation';
    case REQUEST_TEAM_MATCH = 'tem_match';
    case REQUEST_TEAM_MATCH_PLAYER = 'team_match_player';
    case REQUEST_CREATE_COURT = 'create_court';
    case REQUEST_CREATE_COURT_BUSINESS = 'create_court_business';
}


