<?php

namespace App\Enums;

enum SeatStatus
{
    case AVAILABLE;
    case RESERVED;
    case BOOKED;
    case UNAVAILABLE;

    public function getLabel()
    {
        return match ($this) {
            self::AVAILABLE => "Available",
            self::RESERVED => "Reserved",
            self::BOOKED => "Booked",
            self::UNAVAILABLE => "Unavailable",
            default => "Undefined",
        };
    }
}
