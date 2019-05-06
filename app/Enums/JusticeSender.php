<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class JusticeSender extends Enum
{
    const Side_A = 0;
    const Side_B = 1;
    const Both = 2;
    const Other = 4;
    const International = 5;
}
