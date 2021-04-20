<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Turkish;

use Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Pattern('/l[ae]r$/i'), ''));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Pattern('/([eöiü][^aoıueöiü]{0,6})$/u'), '\\1ler'));
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Pattern('/([aoıu][^aoıueöiü]{0,6})$/u'), '\\1lar'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('ben'), new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('biz')));
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('sen'), new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('siz')));
        (yield new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('o'), new \Typo3RectorPrefix20210420\Doctrine\Inflector\Rules\Word('onlar')));
    }
}
