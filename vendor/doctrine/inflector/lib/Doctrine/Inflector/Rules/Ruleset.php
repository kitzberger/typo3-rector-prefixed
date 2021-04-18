<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Doctrine\Inflector\Rules;

class Ruleset
{
    /** @var Transformations */
    private $regular;
    /** @var Patterns */
    private $uninflected;
    /** @var Substitutions */
    private $irregular;
    public function __construct(\Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Transformations $regular, \Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Patterns $uninflected, \Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Substitutions $irregular)
    {
        $this->regular = $regular;
        $this->uninflected = $uninflected;
        $this->irregular = $irregular;
    }
    public function getRegular() : \Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Transformations
    {
        return $this->regular;
    }
    public function getUninflected() : \Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Patterns
    {
        return $this->uninflected;
    }
    public function getIrregular() : \Typo3RectorPrefix20210418\Doctrine\Inflector\Rules\Substitutions
    {
        return $this->irregular;
    }
}
