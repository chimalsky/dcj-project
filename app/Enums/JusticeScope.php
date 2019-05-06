<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class JusticeScope extends Enum
{
    const Specific_Individual = 0;
    const Named_Group = 1;
    const General_Group = 2;
}
