<?php

declare (strict_types=1);
namespace Rector\Core\Bootstrap;

use Rector\Core\ValueObject\Bootstrap\BootstrapConfigs;
use Typo3RectorPrefix20210418\Symfony\Component\Console\Input\ArgvInput;
use Typo3RectorPrefix20210418\Symplify\SetConfigResolver\ConfigResolver;
use Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo;
final class RectorConfigsResolver
{
    /**
     * @var ConfigResolver
     */
    private $configResolver;
    /**
     * @var array<string, SmartFileInfo[]>
     */
    private $resolvedConfigFileInfos = [];
    /**
     * @var SetConfigResolver
     */
    private $setConfigResolver;
    /**
     * @var ExtensionConfigResolver
     */
    private $extensionConfigResolver;
    public function __construct()
    {
        $this->setConfigResolver = new \Rector\Core\Bootstrap\SetConfigResolver();
        $this->configResolver = new \Typo3RectorPrefix20210418\Symplify\SetConfigResolver\ConfigResolver();
        $this->extensionConfigResolver = new \Rector\Core\Bootstrap\ExtensionConfigResolver();
    }
    /**
     * @return SmartFileInfo[]
     */
    public function resolveFromConfigFileInfo(\Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        $hash = \sha1_file($configFileInfo->getRealPath());
        if ($hash === \false) {
            return [];
        }
        if (isset($this->resolvedConfigFileInfos[$hash])) {
            return $this->resolvedConfigFileInfos[$hash];
        }
        $setFileInfos = $this->setConfigResolver->resolve($configFileInfo);
        $configFileInfos = \array_merge([$configFileInfo], $setFileInfos);
        $this->resolvedConfigFileInfos[$hash] = $configFileInfos;
        return $configFileInfos;
    }
    public function provide() : \Rector\Core\ValueObject\Bootstrap\BootstrapConfigs
    {
        $argvInput = new \Typo3RectorPrefix20210418\Symfony\Component\Console\Input\ArgvInput();
        $mainConfigFileInfo = $this->configResolver->resolveFromInputWithFallback($argvInput, ['rector.php']);
        $configFileInfos = $mainConfigFileInfo instanceof \Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo ? $this->resolveFromConfigFileInfo($mainConfigFileInfo) : [];
        $configFileInfos = $this->appendRectorRecipeConfig($argvInput, $configFileInfos);
        $configFileInfos = $this->extensionConfigResolver->appendExtensionsConfig($configFileInfos);
        return new \Rector\Core\ValueObject\Bootstrap\BootstrapConfigs($mainConfigFileInfo, $configFileInfos);
    }
    /**
     * @param SmartFileInfo[] $configFileInfos
     * @return SmartFileInfo[]
     */
    private function appendRectorRecipeConfig(\Typo3RectorPrefix20210418\Symfony\Component\Console\Input\ArgvInput $argvInput, array $configFileInfos) : array
    {
        if ($argvInput->getFirstArgument() !== 'generate') {
            return $configFileInfos;
        }
        // autoload rector recipe file if present, just for \Rector\RectorGenerator\Command\GenerateCommand
        $rectorRecipeFilePath = \getcwd() . '/rector-recipe.php';
        if (\file_exists($rectorRecipeFilePath)) {
            $configFileInfos[] = new \Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo($rectorRecipeFilePath);
        }
        return $configFileInfos;
    }
}
