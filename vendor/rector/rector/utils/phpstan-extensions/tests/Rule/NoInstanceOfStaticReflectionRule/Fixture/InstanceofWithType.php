<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210410\Symfony\Component\Console\Command\Command;
final class InstanceofWithType
{
    public function check($object)
    {
        if ($object instanceof \Typo3RectorPrefix20210410\Symfony\Component\Console\Command\Command) {
            return \true;
        }
    }
}
