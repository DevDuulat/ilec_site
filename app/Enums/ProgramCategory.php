<?php

namespace App\Enums;

enum ProgramCategory: string
{
    case AUSBILDUNG = 'ausbildung';
    case PFLEGE = 'pflege';
    case AU_PAIR = 'au_pair';
    case FERIENJOB = 'ferienjob';
    case FSJ = 'fsj';
    case SPRACHPROGRAMM = 'sprachprogramm';
    case FACHKRAFTE = 'fachkraefte';

    public function label(): string
    {
        return match($this) {
            self::AUSBILDUNG => 'Ausbildung',
            self::PFLEGE => 'Pflege',
            self::AU_PAIR => 'Au-pair',
            self::FERIENJOB => 'Ferienjob',
            self::FSJ => 'FSJ – Социальный год',
            self::SPRACHPROGRAMM => 'Языковая программа',
            self::FACHKRAFTE => 'Fachkräfte – Специалисты',
        };
    }

    public function type(): ProgramType
    {
        return match($this) {
            self::AUSBILDUNG,
            self::FSJ,
            self::SPRACHPROGRAMM => ProgramType::STUDY,

            self::AU_PAIR,
            self::PFLEGE,
            self::FERIENJOB,
            self::FACHKRAFTE => ProgramType::WORK,
        };
    }
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->label()])
            ->toArray();
    }

}
