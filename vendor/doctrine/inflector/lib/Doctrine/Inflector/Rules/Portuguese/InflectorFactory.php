<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Portuguese;

use Typo3RectorPrefix20210405\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Ruleset;
final class InflectorFactory extends \Typo3RectorPrefix20210405\Doctrine\Inflector\GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : \Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Portuguese\Rules::getSingularRuleset();
    }
    protected function getPluralRuleset() : \Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210405\Doctrine\Inflector\Rules\Portuguese\Rules::getPluralRuleset();
    }
}
