<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210412;

if (\class_exists('Typo3RectorPrefix20210412\\Mockery')) {
    return;
}
class Mockery
{
    /**
     * @param mixed ...$args
     *
     * @return \Mockery\MockInterface
     */
    public static function mock(...$args)
    {
        return new \Typo3RectorPrefix20210412\Mockery\DummyMock();
    }
}
\class_alias('Typo3RectorPrefix20210412\\Mockery', 'Mockery', \false);
