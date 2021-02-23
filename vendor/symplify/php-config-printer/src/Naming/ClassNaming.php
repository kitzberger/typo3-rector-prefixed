<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210223\Symplify\PhpConfigPrinter\Naming;

use Typo3RectorPrefix20210223\Nette\Utils\Strings;
final class ClassNaming
{
    public function getShortName(string $class) : string
    {
        if (\Typo3RectorPrefix20210223\Nette\Utils\Strings::contains($class, '\\')) {
            return (string) \Typo3RectorPrefix20210223\Nette\Utils\Strings::after($class, '\\', -1);
        }
        return $class;
    }
}
