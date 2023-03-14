<?php

namespace App\Enums;

enum TodoStatus: int {
    case PENDING = 0;
    case IN_PROGRESS = 1;
    case DONE = 2;
    case CANCELLED = 3;

    public static function fromName(string $name): TodoStatus {
        return constant("self::$name");
    }

    public static function names(): array {
        return array_map(static function (self $todoStatus) {
            return $todoStatus->name;
        }, self::cases());
    }
}
