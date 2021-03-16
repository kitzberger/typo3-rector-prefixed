<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Doctrine\Inflector\Rules;

use Typo3RectorPrefix20210316\Doctrine\Inflector\WordInflector;
use function strtolower;
use function strtoupper;
use function substr;
class Substitutions implements \Typo3RectorPrefix20210316\Doctrine\Inflector\WordInflector
{
    /** @var Substitution[] */
    private $substitutions;
    public function __construct(\Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Substitution ...$substitutions)
    {
        foreach ($substitutions as $substitution) {
            $this->substitutions[$substitution->getFrom()->getWord()] = $substitution;
        }
    }
    public function getFlippedSubstitutions() : \Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Substitutions
    {
        $substitutions = [];
        foreach ($this->substitutions as $substitution) {
            $substitutions[] = new \Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Substitution($substitution->getTo(), $substitution->getFrom());
        }
        return new \Typo3RectorPrefix20210316\Doctrine\Inflector\Rules\Substitutions(...$substitutions);
    }
    public function inflect(string $word) : string
    {
        $lowerWord = \strtolower($word);
        if (isset($this->substitutions[$lowerWord])) {
            $firstLetterUppercase = $lowerWord[0] !== $word[0];
            $toWord = $this->substitutions[$lowerWord]->getTo()->getWord();
            if ($firstLetterUppercase) {
                return \strtoupper($toWord[0]) . \substr($toWord, 1);
            }
            return $toWord;
        }
        return $word;
    }
}
