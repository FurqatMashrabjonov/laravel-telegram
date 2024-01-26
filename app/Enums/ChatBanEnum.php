<?php

namespace App\Enums;

use phpDocumentor\Reflection\PseudoTypes\Numeric_;

enum ChatBanEnum: int
{

    case BANNED = 1;
    case NOT_BANNED = 0;

}
