<?php

namespace App\Enums\Request;

enum RequestStatusEnum: string
{
    case WAITING_FOR_APPROVAL = 'waiting_for_approval';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}

