<?php

namespace App\Enums;

enum SeatStatus: String
{
    case AVAILABLE = "Available";
    case RESERVED = "Reserved";
    case BOOKED = "Booked";
    case UNAVAILABLE = "Unavailable";
}
