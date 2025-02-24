<?php

namespace App\Enum;

enum TeamStatusEnum: int
{
    case ACTIVE = 1;
    case ARCHIVED = 0;
    case DELETED = -1;
}
