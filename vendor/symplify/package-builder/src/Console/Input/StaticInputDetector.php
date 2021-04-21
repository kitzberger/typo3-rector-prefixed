<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Input;

use Typo3RectorPrefix20210421\Symfony\Component\Console\Input\ArgvInput;
final class StaticInputDetector
{
    public static function isDebug() : bool
    {
        $argvInput = new \Typo3RectorPrefix20210421\Symfony\Component\Console\Input\ArgvInput();
        return $argvInput->hasParameterOption(['--debug', '-v', '-vv', '-vvv']);
    }
}
