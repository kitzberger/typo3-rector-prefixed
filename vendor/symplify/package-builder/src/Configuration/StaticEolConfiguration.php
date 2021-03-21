<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Symplify\PackageBuilder\Configuration;

final class StaticEolConfiguration
{
    public static function getEolChar() : string
    {
        return "\n";
    }
}
