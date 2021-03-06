<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Doctrine\Inflector\Rules;

use Typo3RectorPrefix20210423\Doctrine\Inflector\WordInflector;
class Transformations implements \Typo3RectorPrefix20210423\Doctrine\Inflector\WordInflector
{
    /** @var Transformation[] */
    private $transformations;
    public function __construct(\Typo3RectorPrefix20210423\Doctrine\Inflector\Rules\Transformation ...$transformations)
    {
        $this->transformations = $transformations;
    }
    public function inflect(string $word) : string
    {
        foreach ($this->transformations as $transformation) {
            if ($transformation->getPattern()->matches($word)) {
                return $transformation->inflect($word);
            }
        }
        return $word;
    }
}
