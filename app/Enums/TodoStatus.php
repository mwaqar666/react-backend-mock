<?php

namespace App\Enums;

enum TodoStatus: int {
    case PENDING = 0;
    case IN_PROGRESS = 1;
    case DONE = 2;
    case CANCELLED = 3;
}
