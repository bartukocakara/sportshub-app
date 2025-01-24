<?php

namespace App\Enums;

enum ReservationStatusEnum : int {
    case WAITING_FOR_APPROVAL          = 1;
    case APPROVED                      = 2;
    case PLAYING                       = 3;
    case REJECTED                      = 4;
    case CANCELED                      = 5;
    case ENDED                         = 6;
}


