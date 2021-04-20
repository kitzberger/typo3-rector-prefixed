<?php

declare (strict_types=1);
namespace Rector\Compiler\Command;

use Typo3RectorPrefix20210420\Nette\Utils\Strings;
use Rector\Compiler\Downgrade\WhyNotVendorPackagesResolver;
use Typo3RectorPrefix20210420\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210420\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210420\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210420\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210420\Symfony\Component\Finder\Finder;
use Typo3RectorPrefix20210420\Symplify\PackageBuilder\Console\ShellCode;
final class DowngradePathsCommand extends \Typo3RectorPrefix20210420\Symfony\Component\Console\Command\Command
{
    /**
     * @var string
     */
    private const OPTION_PHP_VERSION = 'PHP_VERSION';
    /**
     * @var WhyNotVendorPackagesResolver
     */
    private $whyNotVendorPackagesResolver;
    public function __construct(\Rector\Compiler\Downgrade\WhyNotVendorPackagesResolver $whyNotVendorPackagesResolver)
    {
        $this->whyNotVendorPackagesResolver = $whyNotVendorPackagesResolver;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setDescription('[DEV] Provide vendor paths that require downgrade to required PHP version');
        $this->addArgument(self::OPTION_PHP_VERSION, \Typo3RectorPrefix20210420\Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Target PHP version');
    }
    protected function execute(\Typo3RectorPrefix20210420\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210420\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $targetPhpVersion = (string) $input->getArgument(self::OPTION_PHP_VERSION);
        $downgradePaths = $this->whyNotVendorPackagesResolver->resolveFromPhpVersion($targetPhpVersion);
        $downgradePaths = \array_values($downgradePaths);
        $rulesPaths = $this->resolveRulesPaths();
        $downgradePaths = \array_merge($downgradePaths, $rulesPaths);
        // make symplify grouped into 1 directory, to make covariance downgrade work with all dependent classes
        $rulesPaths = $this->resolveRulesPaths();
        $downgradePaths = \array_merge($downgradePaths, $rulesPaths);
        // make symplify grouped into 1 directory, to make covariance downgrade work with all dependent classes
        foreach ($downgradePaths as $key => $downgradePath) {
            if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::startsWith($downgradePath, 'vendor/symplify')) {
                unset($downgradePaths[$key]);
            }
            if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::startsWith($downgradePath, 'vendor/symfony')) {
                unset($downgradePaths[$key]);
            }
            if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::startsWith($downgradePath, 'vendor/nikic')) {
                unset($downgradePaths[$key]);
            }
            if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::startsWith($downgradePath, 'vendor/psr')) {
                unset($downgradePaths[$key]);
            }
        }
        $downgradePaths = \array_merge(['vendor/symplify vendor/symfony vendor/psr vendor/nikic src packages'], $downgradePaths);
        $downgradePaths = \array_values($downgradePaths);
        // bash format
        $downgradePathsLine = \implode(';', $downgradePaths);
        echo $downgradePathsLine . \PHP_EOL;
        return \Typo3RectorPrefix20210420\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
    /**
     * @return string[]
     */
    private function resolveRulesPaths() : array
    {
        $finder = new \Typo3RectorPrefix20210420\Symfony\Component\Finder\Finder();
        $finder->directories()->depth(0)->in(__DIR__ . '/../../../../rules')->sortByName();
        $rulesPaths = [];
        foreach ($finder->getIterator() as $fileInfo) {
            $rulesPaths[] = 'rules/' . $fileInfo->getRelativePathname();
        }
        return $rulesPaths;
    }
}
