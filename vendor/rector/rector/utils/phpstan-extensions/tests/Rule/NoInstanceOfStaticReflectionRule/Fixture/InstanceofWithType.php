<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210415\Hoa\Math\Sampler\Random;
final class InstanceofWithType
{
    public function check($object)
    {
        if ($object instanceof \Typo3RectorPrefix20210415\Hoa\Math\Sampler\Random) {
            return \true;
        }
    }
}
