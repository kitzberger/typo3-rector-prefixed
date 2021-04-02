<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English;

use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Patterns;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Ruleset;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitutions;
use Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformations;
final class Rules
{
    public static function getSingularRuleset() : \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Ruleset
    {
        return new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Ruleset(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformations(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Inflectible::getSingular()), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Patterns(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Uninflected::getSingular()), (new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitutions(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Inflectible::getIrregular()))->getFlippedSubstitutions());
    }
    public static function getPluralRuleset() : \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Ruleset
    {
        return new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Ruleset(new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Transformations(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Inflectible::getPlural()), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Patterns(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Uninflected::getPlural()), new \Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\Substitutions(...\Typo3RectorPrefix20210402\Doctrine\Inflector\Rules\English\Inflectible::getIrregular()));
    }
}
