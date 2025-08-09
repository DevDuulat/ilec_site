<?php
namespace App\Enums;
enum Country: string
{
    case US = 'US';
    case UK = 'UK';
    case CA = 'CA';
    case AU = 'AU';
    case DE = 'DE';

    public function name(): string
    {
        return match($this) {
            self::US => 'США',
            self::UK => 'Великобритания',
            self::CA => 'Канада',
            self::AU => 'Австралия',
            self::DE => 'Германия',
        };
    }
}
