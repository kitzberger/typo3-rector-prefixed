<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symplify\SetConfigResolver\Bootstrap;

use Typo3RectorPrefix20210420\Nette\Utils\ObjectHelpers;
use Typo3RectorPrefix20210420\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210420\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use Typo3RectorPrefix20210420\Symplify\SetConfigResolver\Exception\SetNotFoundException;
/**
 * @see \Symplify\SetConfigResolver\Tests\Bootstrap\InvalidSetReporterTest
 */
final class InvalidSetReporter
{
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    public function __construct()
    {
        $symfonyStyleFactory = new \Typo3RectorPrefix20210420\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory();
        $this->symfonyStyle = $symfonyStyleFactory->create();
    }
    public function report(\Typo3RectorPrefix20210420\Symplify\SetConfigResolver\Exception\SetNotFoundException $setNotFoundException) : void
    {
        $message = $setNotFoundException->getMessage();
        $suggestedSet = \Typo3RectorPrefix20210420\Nette\Utils\ObjectHelpers::getSuggestion($setNotFoundException->getAvailableSetNames(), $setNotFoundException->getSetName());
        if ($suggestedSet !== null) {
            $message .= \sprintf('. Did you mean "%s"?', $suggestedSet);
            $this->symfonyStyle->error($message);
        } elseif ($setNotFoundException->getAvailableSetNames() !== []) {
            $this->symfonyStyle->error($message);
            $this->symfonyStyle->note('Pick one of:');
            $this->symfonyStyle->listing($setNotFoundException->getAvailableSetNames());
        }
    }
}
