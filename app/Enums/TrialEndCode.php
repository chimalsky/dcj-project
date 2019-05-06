<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TrialEndCode extends Enum
{
    const Trial_Hearing = 0;
    const Sentencing = 1;
    const Punishment_Release = 2;
}
