<?php

namespace App\Enums\Database;

enum Status: int
{
    case ENABLE = 1;
    case DISABLE = 0;

    public function translate(): string
    {
        return match ($this->value) {
            self::ENABLE  => 'Ativo',
            self::DISABLE => 'Inativo'
        };
    }
}
