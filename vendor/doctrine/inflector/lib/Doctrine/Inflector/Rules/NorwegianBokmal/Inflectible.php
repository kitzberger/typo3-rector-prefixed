<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\NorwegianBokmal;

use Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern('/re$/i'), 'r'));
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern('/er$/i'), ''));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern('/e$/i'), 'er'));
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern('/r$/i'), 're'));
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Pattern('/$/'), 'er'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Word('konto'), new \Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Word('konti')));
    }
}
