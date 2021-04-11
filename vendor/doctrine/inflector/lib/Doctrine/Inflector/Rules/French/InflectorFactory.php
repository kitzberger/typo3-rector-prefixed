<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\French;

use Typo3RectorPrefix20210411\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\Ruleset;
final class InflectorFactory extends \Typo3RectorPrefix20210411\Doctrine\Inflector\GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : \Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\French\Rules::getSingularRuleset();
    }
    protected function getPluralRuleset() : \Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\Ruleset
    {
        return \Typo3RectorPrefix20210411\Doctrine\Inflector\Rules\French\Rules::getPluralRuleset();
    }
}
