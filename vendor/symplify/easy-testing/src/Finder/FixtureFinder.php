<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\EasyTesting\Finder;

use Typo3RectorPrefix20210423\Symfony\Component\Finder\Finder;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class FixtureFinder
{
    /**
     * @var FinderSanitizer
     */
    private $finderSanitizer;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\Finder\FinderSanitizer $finderSanitizer)
    {
        $this->finderSanitizer = $finderSanitizer;
    }
    /**
     * @return SmartFileInfo[]
     */
    public function find(array $sources) : array
    {
        $finder = new \Typo3RectorPrefix20210423\Symfony\Component\Finder\Finder();
        $finder->files()->in($sources)->name('*.php.inc')->path('Fixture')->sortByName();
        return $this->finderSanitizer->sanitize($finder);
    }
}
