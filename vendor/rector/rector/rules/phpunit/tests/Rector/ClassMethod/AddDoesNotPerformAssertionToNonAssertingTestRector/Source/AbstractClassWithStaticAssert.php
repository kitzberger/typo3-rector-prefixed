<?php

declare (strict_types=1);
namespace Rector\PHPUnit\Tests\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Source;

use Typo3RectorPrefix20210317\PHPUnit\Framework\TestCase;
abstract class AbstractClassWithStaticAssert extends \Typo3RectorPrefix20210317\PHPUnit\Framework\TestCase
{
    public function doAssertThis()
    {
        self::anotherMethod();
    }
    private static function anotherMethod()
    {
        self::assertTrue(\true);
    }
}
