<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Spanish;

use Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/ereses$/'), 'erés'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/iones$/'), 'ión'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/ces$/'), 'z'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/es$/'), ''));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/s$/'), ''));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/ú([sn])$/i'), 'Typo3RectorPrefix20210331\\u\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/ó([sn])$/i'), 'Typo3RectorPrefix20210331\\o\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/í([sn])$/i'), 'Typo3RectorPrefix20210331\\i\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/é([sn])$/i'), 'Typo3RectorPrefix20210331\\e\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/á([sn])$/i'), 'Typo3RectorPrefix20210331\\a\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/z$/i'), 'ces'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/([aeiou]s)$/i'), '\\1'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/([^aeéiou])$/i'), '\\1es'));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Pattern('/$/'), 's'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('el'), new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('los')));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('papá'), new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('papás')));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('mamá'), new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('mamás')));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('sofá'), new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('sofás')));
        (yield new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('mes'), new \Typo3RectorPrefix20210331\Doctrine\Inflector\Rules\Word('meses')));
    }
}
