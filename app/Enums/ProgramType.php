<?php

namespace App\Enums;

enum ProgramType: string
{
    case STUDY = 'study';
    case WORK = 'work';

    public function label(): string
    {
        return match($this) {
            self::STUDY => 'Учёба в Германии',
            self::WORK => 'Работа в Германии',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
