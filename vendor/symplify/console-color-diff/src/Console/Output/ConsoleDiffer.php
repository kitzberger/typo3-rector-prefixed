<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\Console\Output;

use Typo3RectorPrefix20210401\SebastianBergmann\Diff\Differ;
use Typo3RectorPrefix20210401\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\Console\Formatter\ColorConsoleDiffFormatter;
final class ConsoleDiffer
{
    /**
     * @var Differ
     */
    private $differ;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var ColorConsoleDiffFormatter
     */
    private $colorConsoleDiffFormatter;
    public function __construct(\Typo3RectorPrefix20210401\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Typo3RectorPrefix20210401\SebastianBergmann\Diff\Differ $differ, \Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\Console\Formatter\ColorConsoleDiffFormatter $colorConsoleDiffFormatter)
    {
        $this->symfonyStyle = $symfonyStyle;
        $this->differ = $differ;
        $this->colorConsoleDiffFormatter = $colorConsoleDiffFormatter;
    }
    public function diff(string $old, string $new) : string
    {
        $diff = $this->differ->diff($old, $new);
        return $this->colorConsoleDiffFormatter->format($diff);
    }
    public function diffAndPrint(string $old, string $new) : void
    {
        $formattedDiff = $this->diff($old, $new);
        $this->symfonyStyle->writeln($formattedDiff);
    }
}
