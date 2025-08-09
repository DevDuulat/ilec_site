<?php

namespace App\Enums;

enum LanguageLevel: string
{
    case A1A2 = 'a1-a2';
    case B1B2 = 'b1-b2';
    case C1C2 = 'c1-c2';

    public function label(): string
    {
        return match ($this) {
            self::A1A2 => 'A1-A2 (Начальный)',
            self::B1B2 => 'B1-B2 (Средний)',
            self::C1C2 => 'C1-C2 (Продвинутый)',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $case) => [$case->value => $case->label()])
            ->toArray();
    }

}
