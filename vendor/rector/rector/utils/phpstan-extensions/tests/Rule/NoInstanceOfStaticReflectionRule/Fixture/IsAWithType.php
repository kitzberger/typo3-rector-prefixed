<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210411\Symfony\Component\Console\Command\Command;
final class IsAWithType
{
    public function check($object)
    {
        return \is_a($object, \Typo3RectorPrefix20210411\Symfony\Component\Console\Command\Command::class);
    }
}
