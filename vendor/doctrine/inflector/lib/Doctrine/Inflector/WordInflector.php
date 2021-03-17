<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word) : string;
}
