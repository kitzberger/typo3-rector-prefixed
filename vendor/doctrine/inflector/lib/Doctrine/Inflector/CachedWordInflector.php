<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Doctrine\Inflector;

class CachedWordInflector implements \Typo3RectorPrefix20210420\Doctrine\Inflector\WordInflector
{
    /** @var WordInflector */
    private $wordInflector;
    /** @var string[] */
    private $cache = [];
    public function __construct(\Typo3RectorPrefix20210420\Doctrine\Inflector\WordInflector $wordInflector)
    {
        $this->wordInflector = $wordInflector;
    }
    public function inflect(string $word) : string
    {
        return $this->cache[$word] ?? ($this->cache[$word] = $this->wordInflector->inflect($word));
    }
}
