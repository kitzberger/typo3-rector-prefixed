<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227\Doctrine\Inflector;

use Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset;
use function array_unshift;
abstract class GenericLanguageInflectorFactory implements \Typo3RectorPrefix20210227\Doctrine\Inflector\LanguageInflectorFactory
{
    /** @var Ruleset[] */
    private $singularRulesets = [];
    /** @var Ruleset[] */
    private $pluralRulesets = [];
    public final function __construct()
    {
        $this->singularRulesets[] = $this->getSingularRuleset();
        $this->pluralRulesets[] = $this->getPluralRuleset();
    }
    public final function build() : \Typo3RectorPrefix20210227\Doctrine\Inflector\Inflector
    {
        return new \Typo3RectorPrefix20210227\Doctrine\Inflector\Inflector(new \Typo3RectorPrefix20210227\Doctrine\Inflector\CachedWordInflector(new \Typo3RectorPrefix20210227\Doctrine\Inflector\RulesetInflector(...$this->singularRulesets)), new \Typo3RectorPrefix20210227\Doctrine\Inflector\CachedWordInflector(new \Typo3RectorPrefix20210227\Doctrine\Inflector\RulesetInflector(...$this->pluralRulesets)));
    }
    public final function withSingularRules(?\Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset $singularRules, bool $reset = \false) : \Typo3RectorPrefix20210227\Doctrine\Inflector\LanguageInflectorFactory
    {
        if ($reset) {
            $this->singularRulesets = [];
        }
        if ($singularRules instanceof \Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset) {
            \array_unshift($this->singularRulesets, $singularRules);
        }
        return $this;
    }
    public final function withPluralRules(?\Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset $pluralRules, bool $reset = \false) : \Typo3RectorPrefix20210227\Doctrine\Inflector\LanguageInflectorFactory
    {
        if ($reset) {
            $this->pluralRulesets = [];
        }
        if ($pluralRules instanceof \Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset) {
            \array_unshift($this->pluralRulesets, $pluralRules);
        }
        return $this;
    }
    protected abstract function getSingularRuleset() : \Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset;
    protected abstract function getPluralRuleset() : \Typo3RectorPrefix20210227\Doctrine\Inflector\Rules\Ruleset;
}
