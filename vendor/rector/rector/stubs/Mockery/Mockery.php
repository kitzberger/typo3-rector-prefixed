<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

if (\class_exists('Typo3RectorPrefix20210420\\Mockery')) {
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
        return new \Typo3RectorPrefix20210420\Mockery\DummyMock();
    }
}
\class_alias('Typo3RectorPrefix20210420\\Mockery', 'Mockery', \false);
