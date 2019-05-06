<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TrialStartCode extends Enum
{
    const Detainment = 0;
    const Arrest = 1;
    const Indictment = 2;
    const Trial_Hearing = 3;
    const Sentencing = 4;
    const Punishment_Release = 5;
}
