<?php

namespace App\Enums;

enum ProgramType: string
{
    case STUDY = 'study';
    case WORK = 'work';

    public function label(): string
    {
        return match($this) {
            self::STUDY => __('programs.program_types.study'),
            self::WORK => __('programs.program_types.work'),
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
