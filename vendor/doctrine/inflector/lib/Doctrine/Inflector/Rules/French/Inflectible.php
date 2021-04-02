<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\French;

use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(b|cor|ém|gemm|soupir|trav|vant|vitr)aux$/'), '\\1ail'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/ails$/'), 'ail'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(journ|chev)aux$/'), '\\1al'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)x$/'), '\\1'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/s$/'), ''));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(s|x|z)$/'), '\\1'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(b|cor|ém|gemm|soupir|trav|vant|vitr)ail$/'), '\\1aux'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/ail$/'), 'ails'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/al$/'), 'aux'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(bleu|émeu|landau|lieu|pneu|sarrau)$/'), '\\1s'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)$/'), '\\1x'));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Pattern('/$/'), 's'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('monsieur'), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('messieurs')));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('madame'), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('mesdames')));
        (yield new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('mademoiselle'), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Word('mesdemoiselles')));
    }
}
