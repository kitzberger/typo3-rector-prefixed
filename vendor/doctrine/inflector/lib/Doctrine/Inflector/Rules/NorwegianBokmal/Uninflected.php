<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311\Doctrine\Inflector\Rules\NorwegianBokmal;

use Typo3RectorPrefix20210311\Doctrine\Inflector\Rules\Pattern;
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
        (yield new \Typo3RectorPrefix20210311\Doctrine\Inflector\Rules\Pattern('barn'));
        (yield new \Typo3RectorPrefix20210311\Doctrine\Inflector\Rules\Pattern('fjell'));
        (yield new \Typo3RectorPrefix20210311\Doctrine\Inflector\Rules\Pattern('hus'));
    }
}
