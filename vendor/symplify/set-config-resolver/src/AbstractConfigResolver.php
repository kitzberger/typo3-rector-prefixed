<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330\Symplify\SetConfigResolver;

use Typo3RectorPrefix20210330\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Console\Option\OptionName;
use Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Console\OptionValueResolver;
use Typo3RectorPrefix20210330\Symplify\SmartFileSystem\Exception\FileNotFoundException;
use Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo;
abstract class AbstractConfigResolver
{
    /**
     * @var OptionValueResolver
     */
    private $optionValueResolver;
    public function __construct()
    {
        $this->optionValueResolver = new \Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Console\OptionValueResolver();
    }
    public function resolveFromInput(\Typo3RectorPrefix20210330\Symfony\Component\Console\Input\InputInterface $input) : ?\Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo
    {
        $configValue = $this->optionValueResolver->getOptionValue($input, \Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Console\Option\OptionName::CONFIG);
        if ($configValue !== null) {
            if (!\file_exists($configValue)) {
                $message = \sprintf('File "%s" was not found', $configValue);
                throw new \Typo3RectorPrefix20210330\Symplify\SmartFileSystem\Exception\FileNotFoundException($message);
            }
            return $this->createFileInfo($configValue);
        }
        return null;
    }
    /**
     * @param string[] $fallbackFiles
     */
    public function resolveFromInputWithFallback(\Typo3RectorPrefix20210330\Symfony\Component\Console\Input\InputInterface $input, array $fallbackFiles) : ?\Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo
    {
        $configFileInfo = $this->resolveFromInput($input);
        if ($configFileInfo !== null) {
            return $configFileInfo;
        }
        return $this->createFallbackFileInfoIfFound($fallbackFiles);
    }
    /**
     * @param string[] $fallbackFiles
     */
    private function createFallbackFileInfoIfFound(array $fallbackFiles) : ?\Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo
    {
        foreach ($fallbackFiles as $fallbackFile) {
            $rootFallbackFile = \getcwd() . \DIRECTORY_SEPARATOR . $fallbackFile;
            if (\is_file($rootFallbackFile)) {
                return $this->createFileInfo($rootFallbackFile);
            }
        }
        return null;
    }
    private function createFileInfo(string $configValue) : \Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo
    {
        return new \Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo($configValue);
    }
}
