<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\EasyTesting\Command;

use Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\Finder\FixtureFinder;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\MissplacedSkipPrefixResolver;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\ValueObject\Option;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\Command\AbstractSymplifyCommand;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode;
final class ValidateFixtureSkipNamingCommand extends \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\Command\AbstractSymplifyCommand
{
    /**
     * @var MissplacedSkipPrefixResolver
     */
    private $missplacedSkipPrefixResolver;
    /**
     * @var FixtureFinder
     */
    private $fixtureFinder;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\EasyTesting\MissplacedSkipPrefixResolver $missplacedSkipPrefixResolver, \Typo3RectorPrefix20210423\Symplify\EasyTesting\Finder\FixtureFinder $fixtureFinder)
    {
        $this->missplacedSkipPrefixResolver = $missplacedSkipPrefixResolver;
        $this->fixtureFinder = $fixtureFinder;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->addArgument(\Typo3RectorPrefix20210423\Symplify\EasyTesting\ValueObject\Option::SOURCE, \Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputArgument::REQUIRED | \Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Paths to analyse');
        $this->setDescription('Check that skipped fixture files (without `-----` separator) have a "skip" prefix');
    }
    protected function execute(\Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $source = (array) $input->getArgument(\Typo3RectorPrefix20210423\Symplify\EasyTesting\ValueObject\Option::SOURCE);
        $fixtureFileInfos = $this->fixtureFinder->find($source);
        $missplacedFixtureFileInfos = $this->missplacedSkipPrefixResolver->resolve($fixtureFileInfos);
        if ($missplacedFixtureFileInfos === []) {
            $message = \sprintf('All %d fixture files have valid names', \count($fixtureFileInfos));
            $this->symfonyStyle->success($message);
            return \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        foreach ($missplacedFixtureFileInfos['incorrect_skips'] as $missplacedFixtureFileInfo) {
            $errorMessage = \sprintf('The file "%s" should drop the "skip/keep" prefix', $missplacedFixtureFileInfo->getRelativeFilePathFromCwd());
            $this->symfonyStyle->note($errorMessage);
        }
        foreach ($missplacedFixtureFileInfos['missing_skips'] as $missplacedFixtureFileInfo) {
            $errorMessage = \sprintf('The file "%s" should start with "skip/keep" prefix', $missplacedFixtureFileInfo->getRelativeFilePathFromCwd());
            $this->symfonyStyle->note($errorMessage);
        }
        $countError = \count($missplacedFixtureFileInfos['incorrect_skips']) + \count($missplacedFixtureFileInfos['missing_skips']);
        if ($countError === 0) {
            $message = \sprintf('All %d fixture files have valid names', \count($fixtureFileInfos));
            $this->symfonyStyle->success($message);
            return \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        $errorMessage = \sprintf('Found %d test file fixtures with wrong prefix', $countError);
        $this->symfonyStyle->error($errorMessage);
        return \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode::ERROR;
    }
}
