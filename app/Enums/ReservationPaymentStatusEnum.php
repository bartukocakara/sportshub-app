<?php

namespace App\Enums;

use Illuminate\Support\Facades\Lang;

enum ReservationPaymentStatusEnum : int {
    case WAITING_FOR_PAYMENT    = 1;
    case PAYMENT_APPROVED       = 2;
    case PAYMENT_CANCELED       = 3;
    case PAYMENT_REFUNDED       = 4;
}


