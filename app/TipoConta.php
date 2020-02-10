<?php

namespace App;

use MyCLabs\Enum\Enum;

class TipoConta extends Enum
{
    public const CONTA_CORRENTE = 1;
    public const CONTA_POUPANCA = 2;
}
