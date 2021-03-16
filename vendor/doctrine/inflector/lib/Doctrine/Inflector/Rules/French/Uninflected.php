<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\French;

use Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Pattern;
final class Uninflected
{
    /**
     * @return Pattern[]
     */
    public static function getSingular() : iterable
    {
        yield from self::getDefault();
    }
    /**
     * @return Pattern[]
     */
    public static function getPlural() : iterable
    {
        yield from self::getDefault();
    }
    /**
     * @return Pattern[]
     */
    private static function getDefault() : iterable
    {
        (yield new \Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Pattern(''));
    }
}
