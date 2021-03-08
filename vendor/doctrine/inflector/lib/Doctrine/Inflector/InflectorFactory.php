<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308\Doctrine\Inflector;

use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\English;
use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\French;
use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\NorwegianBokmal;
use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Portuguese;
use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Spanish;
use Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Turkish;
use InvalidArgumentException;
use function sprintf;
final class InflectorFactory
{
    public static function create() : \Typo3RectorPrefix20210308\Doctrine\Inflector\LanguageInflectorFactory
    {
        return self::createForLanguage(\Typo3RectorPrefix20210308\Doctrine\Inflector\Language::ENGLISH);
    }
    public static function createForLanguage(string $language) : \Typo3RectorPrefix20210308\Doctrine\Inflector\LanguageInflectorFactory
    {
        switch ($language) {
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::ENGLISH:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\English\InflectorFactory();
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::FRENCH:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\French\InflectorFactory();
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::NORWEGIAN_BOKMAL:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\NorwegianBokmal\InflectorFactory();
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::PORTUGUESE:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Portuguese\InflectorFactory();
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::SPANISH:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Spanish\InflectorFactory();
            case \Typo3RectorPrefix20210308\Doctrine\Inflector\Language::TURKISH:
                return new \Typo3RectorPrefix20210308\Doctrine\Inflector\Rules\Turkish\InflectorFactory();
            default:
                throw new \InvalidArgumentException(\sprintf('Language "%s" is not supported.', $language));
        }
    }
}
