<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210412\Hoa\Math\Sampler\Random;
final class IsAWithType
{
    public function check($object)
    {
        return \is_a($object, \Typo3RectorPrefix20210412\Hoa\Math\Sampler\Random::class);
    }
}
