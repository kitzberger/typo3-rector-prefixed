<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\NorwegianBokmal;

use Typo3RectorPrefix20210317\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\Ruleset;
final class InflectorFactory extends \Typo3RectorPrefix20210317\Doctrine\Inflector\GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : \Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\NorwegianBokmal\Rules::getSingularRuleset();
    }
    protected function getPluralRuleset() : \Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210317\Doctrine\Inflector\Rules\NorwegianBokmal\Rules::getPluralRuleset();
    }
}
