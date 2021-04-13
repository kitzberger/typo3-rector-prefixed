<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210413\Symfony\Component\Console\Helper\ProgressBar;
final class SkipSymfony
{
    public function find($node)
    {
        return $node instanceof \Typo3RectorPrefix20210413\Symfony\Component\Console\Helper\ProgressBar;
    }
}
