<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

if (\class_exists('Typo3RectorPrefix20210414\\Mockery')) {
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
        return new \Typo3RectorPrefix20210414\Mockery\DummyMock();
    }
}
\class_alias('Typo3RectorPrefix20210414\\Mockery', 'Mockery', \false);
