<?php

declare (strict_types=1);
namespace Rector\Core\Tests\Util;

use DateTime;
use Iterator;
use Typo3RectorPrefix20210227\PHPUnit\Framework\TestCase;
use Rector\Core\Util\StaticInstanceOf;
use stdClass;
final class StaticInstanceOfTest extends \Typo3RectorPrefix20210227\PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideIsOneOf()
     * @param class-string[] $array
     */
    public function testIsOneOf(?object $object, array $array, bool $expected) : void
    {
        $this->assertSame($expected, \Rector\Core\Util\StaticInstanceOf::isOneOf($object, $array));
    }
    public function provideIsOneOf() : \Iterator
    {
        (yield [new \DateTime('now'), [\DateTime::class, \stdClass::class], \true]);
        (yield [new \stdClass(), [\DateTime::class, \Iterator::class], \false]);
        (yield [null, [\DateTime::class, \Iterator::class], \false]);
    }
}
