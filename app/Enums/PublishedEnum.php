<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PublishedEnum extends Enum
{
    #[Description('No')]
    const No = 0;

    #[Description('Yes')]
    const Yes = 1;
}
