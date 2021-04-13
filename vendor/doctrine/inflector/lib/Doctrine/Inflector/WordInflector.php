<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word) : string;
}
