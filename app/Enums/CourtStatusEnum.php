<?php

namespace App\Enums\Court;

enum CourtStatusEnum: string
{
    case WAITING_FOR_APPROVAL = 'waiting_for_approval';
    case AVAILABLE = 'available';
    case UNAVAILABLE = 'unavailable';
}



